<?php

namespace App\Events;

use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class MessageSent implements ShouldBroadcastNow 
{
    use Dispatchable, InteractsWithSockets, SerializesModels  ;

    /**
     * Create a new event instance.
     */
    public $message_body;
    public $sender_id;
    public $sender_name;
    public $message_id;
    public function __construct(private User $other, Message $message)
    {
        //
        $this->message_body=view("components.chat.other-message",["message"=> $message,"user"=>auth()->user()])->render();
        $this->sender_id=auth()->id();
        $this->message_id=$message->uuid;

        $this->sender_name=auth()->user()->name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        $ids=[$this->other->id,auth()->id()];
        return [
        
            new PresenceChannel('user'.min($ids).".chat.user".max($ids)),
            new PrivateChannel("App.Models.User.".$this->other->id),
        ];
        
    }

    public function broadcastAs()
    {
        return "message-sent";
    }
}
