<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class EventPageController extends Controller
{
    public function index(){

        return view('event.event-consultation');
    }
}
