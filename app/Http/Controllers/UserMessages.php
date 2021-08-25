<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class UserMessages extends Controller
{
    public function index(){
        $messageList = Message::where('userId' , auth()->user()->id);

        $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();
        return view('user.messages', compact('messageList', 'messages'));
    }
}
