<?php
/**
 * Created by PhpStorm.
 * User: Webber
 * Date: 2018-10-12
 * Time: 22:03
 */

namespace App\Http\Controllers;


class PaymentControllerTest extends \PHPUnit_Framework_TestCase
{
    public $pay;
    public $date;
    function setUp()
    {
        $this->date = new Date("h:i:sa");
        $this->pay = new PaymentController($this->date);
    }
    function testProcessPayment()
    {
        $request = new Request();
        $this->pay->processPayment($request,"20181013456789");
        $response = $this->withSession(['payment_id' => "20181013456789"]);
    }
    function testExecutePayment()
    {
        $request = new Request();
        $this->pay->executePayment($request,"20181013456789");
        $response = $this->get('/profile/date/');
        $this->assertContains($response, 'Thank You! Your Payment Has Been Successfully Made.');
    }
    function testUpdateSender()
    {
        $request = new Request();
        $this->pay->updateSender($request,"20181013456789");
        $response = $this->get('/');
        $this->assertContains($response, 'Your money has been refunded.');
    }
    function testUpdateReceiver()
    {
        $request = new Request();
        $this->pay->updateReceiver($request,"20181013456789");
        $response = $this->get('/');
        $this->assertContains($response, 'Status has been updated.');
    }
    function testRefund()
    {
        $this->pay->refund($this->date);
        $this->assertTrue($this->date->payment_status == $this->pay->config['Refunded']);
    }
    function testUpdateDateObject()
    {
        $sale = new Sale();
        $this->pay->updateDateObject("20181013456789",$sale);
        $this->assertTrue($this->date->payment_status==$this->pay->config['Paid']);
    }
    function testCreateChatObject()
    {
        $this->pay->createChatObject("20181013456789");
        $this->assertTrue($this->date->chat['date_id']==$this->date->id);
    }
    function tearDown() {
        unset($this->pay);
    }
}
