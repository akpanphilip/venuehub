<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\EventService;
use App\Models\EventType;
use App\Models\Listings;
use App\Models\VenueType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index(){

        $listings = DB::table('listings')->where('status', 1)->paginate('10');

        $venueTypes = VenueType::withCount('listings')->get();


        $eventServiceLists = DB::table('event_service_lists')->where('status', 1)->paginate('10');

        $eventTypes = EventType::all();

        $ads = Ad::all();

        return view('home', compact('listings', 'venueTypes', 'eventTypes','eventServiceLists', 'ads'));
    }
}
