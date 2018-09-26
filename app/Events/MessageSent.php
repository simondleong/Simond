<?php

namespace App\Events;

use App\Models\User;
use App\Models\Message;
use App\Models\Chat;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * User that sent the message
     *
     * @var User
     */
    public $user;

    /**
     * Message details
     *
     * @var message
     */
    public $message;

    /**
     * Chat Details
     *
     * @var chat
     */
    public $chat;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Message $message, Chat $chat) {
        $this->user = $user;
        $this->message = $message;
        $this->chat = $chat;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn() {
        return new Channel('chat.' . $this->chat->id);
    }
}
