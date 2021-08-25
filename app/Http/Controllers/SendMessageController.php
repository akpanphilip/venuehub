<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    public function index($id)
    {
        $userInfo = User::find($id);

        return view('admin.send-message', compact('userInfo'));
    }
    public function send(Request $request){
        $this->validate($request, [
            'message' => 'required|max:140',
        ]);

        Message::create([
            'messages'=> $request->message,
            'userId' => $request->userId,
        ]);

        return back()->with('status', 'Sent!');


    }
}
