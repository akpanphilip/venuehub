<?php

namespace App\Http\Controllers;

use App\Models\CallRequest;
use Illuminate\Http\Request;

class CallRequestController extends Controller

{
    public function callRequest(){
        $user_id = auth()->user()->id;
        $firstname = auth()->user()->firstname;
        $lastname = auth()->user()->lastname;
        $mobile = auth()->user()->mobile;

    $userCallRequest = new CallRequest();
    $userCallRequest->user_id = $user_id;
    $userCallRequest->firstname = $firstname;
    $userCallRequest->lastname = $lastname;
    $userCallRequest->mobile = $mobile;

    $userCallRequest->save();
    return back()->with('callRequestSent', 'Call Request Sent!');

    }

    public function index(){
        $userCallRequests = CallRequest::all();
        return view('admin.call-requests', compact('userCallRequests'));
    }
}
