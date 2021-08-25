<?php

namespace App\Http\Controllers;

use App\Models\EventServiceList;
use App\Models\EventType;
use App\Models\VenueType;
use Illuminate\Http\Request;

class AdminVenuesController extends Controller
{
    public function index()
    {
        $cnt = 1;
        $venueTypes = VenueType::all();
        return view('admin.manage-venues', compact('venueTypes', 'cnt'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'venue' => 'required|max:255',
        ]);
        VenueType::create([
            'venue_type' => $request->venue,
        ]);
        return back()->with('status', 'VENUE TYPE ADDDED SUCCESSFULLY!');
    }
    public function deleteVenueType($id)
    {
        $venue = VenueType::find($id);

        $venue->delete();

        return back()->with('venueDeleted', 'Deleted successfully!');
    }
    public function deleteEventType($id)
    {
        $event = EventType::find($id);

        $event->delete();

        return back()->with('eventDeleted', 'Deleted successfully!');
    }
    public function editVenueType($id)
    {
        $venueType = VenueType::find($id);

        return view('admin.manage-edit-venue', compact('venueType'));
    }
    public function updateVenueType(Request $request){
        $this->validate($request, [
            'name' => 'required|max:50',
        ]);

        $name = $request->name;

        $venueType = VenueType::find($request->id);

        $venueType->venue_type = $name;

        $venueType->save();
        return back()->with('venueTypeUpdated', 'Successfully Updated!');

    }
    public function editEventType($id){
        $eventType = EventType::find($id);

        return view('admin.edit-event-type', compact('eventType'));
    }

    public function updateEventType(Request $request){
        $this->validate($request, [
            'name' => 'required|max:50',
        ]);

        $name = $request->name;

        $eventType = EventType::find($request->id);

        $eventType->event_type = $name;

        $eventType->save();
        return back()->with('eventTypeUpdated', 'Successfully Updated!');

    }
    public function approveEventType($id){
        $approve = EventServiceList::find($id);

        if ($approve) {
            $approve->status = '1';
            $approve->save();
            return back()->with('approvedSuccessfully', 'Event service successfully approved!');
        }
    }
    public function disapproveEventType($id){
        $disapprove = EventServiceList::find($id);

        if ($disapprove) {
            $disapprove->status = '0';
            $disapprove->save();
            return back()->with('disapprovedSuccessfully', 'Event service successfully disapproved!');
        }
    }

}
