<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUspageController extends Controller
{
    public function index(){
        return view('about-us');
    }
}
