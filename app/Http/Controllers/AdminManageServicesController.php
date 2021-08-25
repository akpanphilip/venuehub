<?php

namespace App\Http\Controllers;

use App\Models\EventService;
use App\Models\EventServiceList;
use Illuminate\Http\Request;

class AdminManageServicesController extends Controller
{
    public function index()
    {
        $eventServices = EventService::all();

        return view('admin.manage-services', compact('eventServices'));
    }

    public function manageEServices(Request $request)
    {
        $this->validate($request, [
            'event' => 'required',
        ]);
        EventService::create([
            'event' => $request->event,
        ]);
        return back()->with('EventService', 'Event Service added successfully!');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'budget' => 'required',
            'description' => 'required',
            'highlight' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('eventServices'), $imageName);


        $name = $request->name;
        $location = $request->location;
        $eventservice = $request->eventservice;
        $budget = $request->budget;
        $capacity = $request->capacity;
        $description = $request->description;
        $highlight = $request->highlight;
        $h2 = $request->hightlight2;
        $h3 = $request->hightlight3;

        $eventList = new EventServiceList();
        $eventList->name = $name;
        $eventList->location = $location;
        $eventList->eventservice = $eventservice;
        $eventList->budget = $budget;
        $eventList->capacity = $capacity;
        $eventList->description = $description;
        $eventList->h1 = $highlight;
        $eventList->h2 = $h2;
        $eventList->h3 = $h3;

        $eventList->image = $imageName;
        $eventList->save();
        return back()->with('status', 'Added!');
    }
}
