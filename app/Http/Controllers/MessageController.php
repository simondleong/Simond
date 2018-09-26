<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Chat;
use App\Models\Date;
use App\Models\User;
use App\Events\MessageSent;

class MessageController extends Controller
{
    protected $message, $chat, $date, $user;

    public function __construct(Message $message, Chat $chat, Date $date, User $user) {
        $this->date = $date;
        $this->message = $message;
        $this->chat = $chat;
        $this->user = $user;
    }

    public function index($id) {
        $chat = $this->chat->find($id);
        return view('chat')->with('chat', $chat);
    }

    public function fetchMessages($id) {
        return $this->message
                ->where('chat_id', '=', $id)
                ->with('sender')
                ->get();
    }


    /**
     * Persist message to database
     *
     * @param Request $request
     * @return Response
     */
    public function sendMessage(Request $request) {
        $chat = $this->chat->find($request->chat['id']);
        $user = $this->user->find($request->sender['id']);
        $date = $chat->date;

        $messageReceiverID = 0;
        if ($user->id == $date->receiver_id) {
            $messageReceiverID = $date->sender_id;
        } else {
            $messageReceiverID = $date->receiver_id;
        }

        $message = $chat->messages()->create([
            'chat_id'       => $chat->id,
            'sender_id'     => $user->id,
            'receiver_id'   => $messageReceiverID,
            'message'       => $request->message
        ]);

        broadcast(new MessageSent($user, $message, $chat))->toOthers();

        return response()->json(['status' => 'Message Sent'], 200);
    }
}
