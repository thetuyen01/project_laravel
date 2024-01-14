<?php

namespace App\Http\Controllers\Chat;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{
    public function showFormMessage(){
        return view('chat.chatmessage');
    }

    public function sendMessage(Request $request){
        event(new MessageSent("tuyen"));
        return $request->message;
    } 
}