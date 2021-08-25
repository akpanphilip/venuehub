<?php

namespace App\Http\Controllers;

use App\Models\EventService;
use App\Models\EventServiceList;
use App\Models\EventType;
use App\Models\Listings;
use App\Models\VenueType;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $state = $_POST['state'];

        $venueType = $_POST['venueType'];

        $eventType = $_POST['eventType'];

        $lga = $_POST['lga'];

        $listings = Listings::all();

        $venueTypes = VenueType::all();

        $eventTypes = EventType::all();

        $status = 1;
        
        $venueLists = Listings::query()
            ->where('type', '=',  $venueType )
            ->where('status', '=',  $status)
            ->Where('event', '=',  $eventType)
            ->Where('state', '=',  $state)
            ->orWhere('lga', '=', $lga )
            ->get();

        $total = $venueLists->count();

        return view(
            'search-venue',
            compact(
                'venueLists',
                'state',
                'total',
                'listings',
                'venueTypes',
                'eventTypes',
                'lga'
            )
        );
    }
    public function searchEventServices()
    {
        $location = $_POST['location'];

        $eventService = $_POST['event_service'];

        $eventServiceLists = EventServiceList::all();

        $eventServices = EventService::all();

        $status = 1;

        $serviceLists = EventServiceList::query()
            ->where('location', 'LIKE', '%' . $location . '%')
            ->where('status', 'LIKE', '%' . $status . '%')
            ->orWhere('eventservice', 'LIKE', '%' . $eventService . '%')
            ->get();

        $total = $serviceLists->count();

        return view(
            'search-services',
            compact('serviceLists', 'location', 'total', 'eventServices')
        );
    }
}
