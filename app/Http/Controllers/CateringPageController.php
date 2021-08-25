<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CateringPageController extends Controller
{
    public function index(){
        return view('event.catering-services');
    }
}
