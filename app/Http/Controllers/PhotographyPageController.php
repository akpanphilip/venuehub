<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotographyPageController extends Controller
{
    public function index(){
        return view('event.photography');
    }
}
