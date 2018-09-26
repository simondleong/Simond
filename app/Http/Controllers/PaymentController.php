<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Currency;
use PayPal\Api\PaymentExecution;
use PayPal\Api\PayoutItem;
use PayPal\Api\PayoutSenderBatchHeader;
use PayPal\Api\Refund;
use PayPal\Api\RefundRequest;
use PayPal\Api\Sale;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\Payout;
use Illuminate\Support\Facades\Redirect;

use App\Models\Date;

class PaymentController extends Controller
{
    private $apiContext;
    protected $config, $date;

    public function __construct(Date $date) {
        $this->config             = Config::get('constants');
        $paypalConf         = Config::get('paypal');
        $this->apiContext   = new ApiContext(new OAuthTokenCredential(
            $paypalConf['client_id'],
            $paypalConf['secret']
        ));
        $this->apiContext->setConfig($paypalConf['settings']);

        $this->date = $date;
    }


    /*
     * Process and take to Paypal Page
     */
    public function processPayment(Request $request, $id) {
        $payment = $this->definePayment($id);

        // create payment with valid API context
        try {
            $payment->create($this->apiContext);
        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            dd($ex);
        } catch (\Exception $ex) {
            dd($ex);
        }

        // get paypal redirect URL and redirect the customer
        $approvalUrl = $payment->getApprovalLink();
        session()->put('payment_id', $payment->getId());

        return Redirect::away($approvalUrl);
    }


    /*
     * Execute or cancel payment
     */
    public function executePayment(Request $request, $id) {
        $paymentID = session()->get('payment_id');

        if (($paymentID == null) || ($paymentID == '')) {
            $paymentID = $request->paymentId;
        }

        session()->forget('payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            return redirect('/profile/date/'.$id)->with('flash_error', 'Payment Error');
        }

        $payerID = Input::get('PayerID');
        $payment = Payment::get($paymentID, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerID);

        try {
            $result = $payment->execute($execution, $this->apiContext);

            if ($result->getState() == 'approved') {
                $transactions = $payment->getTransactions();
                $relatedResources = $transactions[0]->getRelatedResources();
                $sale = $relatedResources[0]->getSale();

                $this->createChatObject($id);
                $this->updateDateObject($id, $sale);

                return redirect('/profile/date/'.$id)->with('flash_success',
                    'Thank You! Your Payment Has Been Successfully Made.');
            }
        } catch (PayPalConnectionException $ex) {
//            $data = json_decode($ex->getData());
//            dd($data);
            return redirect('/profile/date/'.$id)->with('flash_error', 'An error occurred within paypal.
                                                                            Please try again');
        } catch (\Exception $ex) {
            return redirect('/profile/date/'.$id)->with('flash_error', 'Payment Error');
        }

        return redirect('/profile/date/'.$id)->with('flash_error', 'Payment Error');
    }


    /*
     * Update Sender
     */
    public function updateSender(Request $request, $id) {
        $date = $this->date->find($id);
        $date->sender_confirmation = $request->sender_confirmation;
        $date->save();

        if (($date->sender_confirmation == $this->config['No Meeting']) ||
            ($date->receiver_confirmation == $this->config['No Meeting'])) {

            // refund the money
            if ($date->payment_status != $this->config['Refunded']) {
                $this->refund($date);
                return redirect()->back()->with('flash_success', 'Your money has been refunded.');
            }

        } else if (($date->sender_confirmation == $this->config['Met']) &&
            ($date->receiver_confirmation == $this->config['Met'])) {

            // payout to the receiver
            $this->payout($date);

        }

        if (($date->sender_confirmation > 0) && ($date->receiver_confirmation > 0)) {
            $date->status = $this->config['Finished'];
            $date->save();
        }

        return redirect()->back()->with('flash_success', 'Status has been updated.');
    }


    /*
     * Update Receiver
     */
    public function updateReceiver(Request $request, $id) {
        $date = $this->date->find($id);
        $date->receiver_confirmation = $request->receiver_confirmation;
        $date->save();

        if (($date->sender_confirmation == $this->config['No Meeting']) ||
            ($date->receiver_confirmation == $this->config['No Meeting'])) {

            // refund the money
            if ($date->payment_status != $this->config['Refunded']) {
                $this->refund($date);
                return redirect()->back()->with('flash_success', 'Sender\'s Money has been refunded.');
            }

        } else if (($date->sender_confirmation == $this->config['Met']) &&
            ($date->receiver_confirmation == $this->config['Met'])) {

            // payout to the receiver
            $this->payout($date);

        }

        if (($date->sender_confirmation > 0) && ($date->receiver_confirmation > 0)) {
            $date->status = $this->config['Finished'];
            $date->save();
        }

        return redirect()->back()->with('flash_success', 'Status has been updated.');
    }


    /*
     * Refund Sale
     */
    private function refund(Date $date) {
        $amount = new Amount();
        $amount->setTotal($this->config['shared_amount'])
            ->setCurrency($this->config['currency']);

        $refundRequest = new RefundRequest();
        $refundRequest->setAmount($amount);

        $sale = new Sale();
        $sale->setId($date->sale_id);

        try {
            $refundedSale = $sale->refundSale($refundRequest, $this->apiContext);
            $date->payment_status = $this->config['Refunded'];
            $date->save();
        } catch (PayPalConnectionException $ex) {
            return redirect()->back()->with('flash_error', 'An error occurred. Please try again.');
        }

        return $refundedSale;
    }


    /*
     * Payout Receiver
     */
    private function payout(Date $date) {
        $payout = new Payout();
        $senderBatchHeader = new PayoutSenderBatchHeader();

        $senderBatchHeader->setSenderBatchId(uniqid())
            ->setEmailSubject("You have a Yeedate Payout!");

        $senderItem = new PayoutItem();
        $senderItem->setRecipientType('Email')
            ->setNote('Thanks for using Yeedate\'s services!')
            ->setReceiver($date->receiver->email)
            ->setSenderItemId($date->id)
            ->setAmount(new Currency('{
                            "value":"'.$this->config['shared_amount'].'",
                            "currency":"'.$this->config['currency'].'"
                            }'));

        $payout->setSenderBatchHeader($senderBatchHeader)
            ->addItem($senderItem);

        $req = clone $payout;

        try {
            $output = $payout->create(null, $this->apiContext);
        } catch (\Exception $ex) {
            return redirect()->back()->with('flash_error', 'An error occurred. Please try again.');
        }

        return $output;
    }

    /*
     * fills required data
     */
    private function definePayment($id) {
        // create new payer and method
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item = new Item();
        $item->setName('Yeedate Fee')
            ->setCurrency($this->config['currency'])
            ->setQuantity(1)
            ->setPrice($this->config['payment_amount']);

        $itemList = new ItemList();
        $itemList->setItems(array($item));

        // set redirect urls
        $executeUrl = URL::to('/profile/date/'.$id.'/execute');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($executeUrl)
            ->setCancelUrl($executeUrl);

        // set payment amount
        $amount = new Amount();
        $amount->setCurrency("AUD")->setTotal($this->config['payment_amount']);

        // set transaction object
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Yeedate Payment");

        // create the full payment object
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        return $payment;
    }


    /*
     * Update Date Object
     */
    private function updateDateObject($id, Sale $sale) {
        $date = $this->date->find($id);

        $date->sale_id  = $sale->getId();
        $date->payment_status = $this->config['Paid'];
        $date->save();
    }


    /*
     * Create Chat Object
     */
    private function createChatObject($id) {
        $date = $this->date->find($id);

        $chat = $date->chat()->create([
            'date_id' => $date->id
        ]);
    }
}
