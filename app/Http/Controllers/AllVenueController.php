<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use Illuminate\Http\Request;

class AllVenueController extends Controller
{
    public function index(){
        $listings = Listings::all();

        return view('all-venues', compact('listings'));
    }
}
