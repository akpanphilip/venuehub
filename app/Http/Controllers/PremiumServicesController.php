<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class PremiumServicesController extends Controller
{
    public function index(){
        $messageList = Message::where('userId' , auth()->user()->id);

        $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();
        return view('user.premium-services', compact('messageList', 'messages'));
    }
    public function howItworks(){
        $messageList = Message::where('userId' , auth()->user()->id);

        $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();
        return view('user.how-it-works', compact('messageList', 'messages'));
    }
}
