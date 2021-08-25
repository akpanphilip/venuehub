<?php

namespace App\Http\Controllers;

use App\Models\EventService;
use App\Models\EventServiceList;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventServicesController extends Controller
{
    public function index(){
        $eventServices = EventService::all();

        $eventServiceLists = DB::select('select * from event_service_lists where status = ?', [1]);

        // $venueTypes = VenueType::withCount('listings')->get();

        $ess = EventService::withCount('event_service_lists')->get();

        return view('event-services', compact('eventServiceLists', 'eventServices', 'ess'));

    }
    public function singleEvent($id){

        EventServiceList::find($id)->increment('views');

        $singleEvent = EventServiceList::find($id);
        $exact = $singleEvent->user_id;
        $eventServiceLists = EventServiceList::all();


        $usersInfo = DB::select('select * from users where id = ?', [$exact]);
        return view('trending-events' , compact('singleEvent', 'usersInfo', 'eventServiceLists'));
    }
}
