<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminChangePasswordController extends Controller
{
    public function changePassword()
    {
        return view('admin.change-password');
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
