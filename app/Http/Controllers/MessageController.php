<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\Message;

class MessageController extends Controller
{
    public function send(Request $request)
    {
            $message = Message::create([
                'sender_id' => $request->sender_id ,
                'sender_type' => $request->sender_type ,
                'receiver_id' => $request->receiver_id,
                'receiver_type' => $request->receiver_type,
                'content' => $request->content,
         ]);

         broadcast(new MessageSent($message))->toOthers();

         return response()->json(['status' => 'Message Sent!']);
    }
}