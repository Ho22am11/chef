<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\Message;
use App\Traits\ApiResponseTrait;
use Exception;

class MessageController extends Controller
{
  use ApiResponseTrait ;
    public function send(Request $request)
    {
      try{
      $message = Message::create([
        'sender_id' => $request->sender_id ,
        'sender_type' => $request->sender_type ,
        'receiver_id' => $request->receiver_id,
        'receiver_type' => $request->receiver_type,
        'content' => $request->content,
      ]);
      broadcast(new MessageSent($message))->toOthers();
      return response()->json(['status' => 'Message Sent!']);
    }catch(Exception $e){
      return response()->json([
        'error' => 'Something went wrong',
        'message' => $e->getMessage()], 400);
    }
    }


    public function getMessages(Request $request){
      
      try{
      $messages = Message::where(function ($query) use ($request) {
        $query->where('sender_id', $request->sender_id )
        ->where('sender_type', $request->sender_type )
        ->where('receiver_id', $request->receiver_id)
        ->where('receiver_type', $request->receiver_type);
      })->orWhere(function ($query) use ($request) {
        $query->where('sender_id', $request->receiver_id)
        ->where('sender_type', $request->receiver_type)
        ->where('receiver_id', $request->sender_id)
        ->where('receiver_type', $request->sender_type );
      })->orderBy('created_at', 'asc')->get();
      
    
      return $this->ApiResponse($messages , 'get message successful' , 200);

    }catch(Exception $e){
      return response()->json([
        'error' => 'Something went wrong',
        'message' => $e->getMessage()], 400);
    }
      
    }

    

}