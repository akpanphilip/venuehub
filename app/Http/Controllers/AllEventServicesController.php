<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class AllEventServicesController extends Controller
{
    public function index(){
        $messageList = Message::where('userId' , auth()->user()->id);

        $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();
        return view('event.all-event-services', compact('messageList', 'messages'));
    }
}
