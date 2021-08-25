<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword()
    {
        $messageList = Message::where('userId' , auth()->user()->id);
        $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();

        return view('user.change-password', compact('messageList', 'messages'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('changed', 'Changed successfully!');

    }
}
