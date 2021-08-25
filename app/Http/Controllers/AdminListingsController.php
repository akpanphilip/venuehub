<?php

namespace App\Http\Controllers;

use App\Models\EventService;
use App\Models\EventServiceList;
use App\Models\Listings;
use App\Models\VenueType;
use Illuminate\Http\Request;

class AdminListingsController extends Controller
{
    public function index()
    {
        $cnt = 1;
        $listings = Listings::query()
            ->get();
        return view('admin.manage-listings', compact('listings', 'cnt'));
    }
    public function editVenue($id){

        $item = Listings::find($id);

        $venueTypes = VenueType::all();

        return view('admin/edit-venue', compact('item', 'venueTypes'));
    }
    public function updateVenue(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:50',
            'state' => 'required|max:50',
            'lga' => 'required|max:50',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('listingImages'), $imageName);

        $name = $request->name;
        $type = $request->type;
        $people = $request->people;
        $state = $request->state;
        $lga = $request->lga;


        $venue = Listings::find($request->id);
        $venue->name = $name;
        $venue->type = $type;
        $venue->people = $people;
        $venue->state = $state;
        $venue->lga = $lga;


        $venue->image = $imageName;

        $venue->save();
        return back()->with('venueUpdated', 'Successfully Updated!');
    }
    public function services(){

            $cnt = 1;
            $id = auth()->user()->id;
            $services = EventServiceList::all();

            return view('admin.manage-listings-events', compact('services', 'cnt'));
        }
        public function editService($id)
    {
        $item = EventServiceList::find($id);

        $eventServices = EventService::all();

        return view('admin/edit-service', compact('item', 'eventServices'));
    }

    public function updateService(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'budget' => 'required|max:50',
            'description' => 'required|max:50',
            'highlight' => 'required|max:50',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('eventServices'), $imageName);

        $name = $request->name;
        $location = $request->location;
        $lga = $request->lga;
        $eventservice = $request->eventservice;
        $budget = $request->budget;
        $capacity = $request->capacity;
        $description = $request->description;
        $h1 = $request->highlight;
        $h2 = $request->hightlight2;
        $h3 = $request->hightlight3;


        $serviceUpdate = EventServiceList::find($request->id);

        $serviceUpdate->name = $name;
        $serviceUpdate->location = $location;
        $serviceUpdate->lga = $lga;
        $serviceUpdate->eventservice = $eventservice;
        $serviceUpdate->budget = $budget;
        $serviceUpdate->capacity = $capacity;
        $serviceUpdate->description = $description;
        $serviceUpdate->h1 = $h1;
        $serviceUpdate->h2 = $h2;
        $serviceUpdate->h3 = $h3;

        $serviceUpdate->image = $imageName;

        $serviceUpdate->save();
        return back()->with('serviceUpdated', 'Successfully Updated!');
    }
    public function deleteService($id){
        $event = EventServiceList::find($id);

        $event->delete();

        return back()->with('eventDeleted', 'Deleted successfully!');
    }

    }

