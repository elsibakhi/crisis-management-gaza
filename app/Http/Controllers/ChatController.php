<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\MarkMessageAsReadRequest;
use App\Http\Requests\MarkMessagesAsReadRequest;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("ajax")->except([]);
    }
    public function loadChatModal(User $user)
    {

        Message::markAsRead($user->id, Auth::id());



        return view("components.chat.modal", compact("user"));
    }
    public function loadMessagesPages(User $user)
    {


        $auth_user = Auth::user();
        $messages = Message::whereHas("sender", function ($q1) use ($auth_user, $user) {
            $q1->where("id", $auth_user->id)->orWhere("id", $user->id);
        })->whereHasMorph("recipient", [User::class], function ($q2) use ($auth_user, $user) {
            $q2->where("id", $auth_user->id)->orWhere("id", $user->id);
        })->orderByDesc("created_at")->paginate(4);

        return view("components.chat.page", compact("messages", "user"));
    }

    public function store(StoreMessageRequest $request, User $user)
    {



        $message = Message::create(
            [
                "body" => $request->message,
                "sender_id" => Auth::id(),
                "recipient_id" => $user->id,
                "recipient_type" => User::class,
            ]
        );

        MessageSent::dispatch($user, $message);
        return view("components.chat.me-message", ["message" => $message, "user" => Auth::user()]);
    }

    public function markMessageAsRead(MarkMessageAsReadRequest $request)
    {

        $message = Message::find($request->message_id);
        $message->markMessageAsRead();

        return response("success", 200);
    }
    public function loadChats()
    {



        return view("components.user-chats");
    }
}
