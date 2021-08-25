<?php

namespace App\Http\Controllers;

use App\Models\EventService;
use App\Models\EventServiceList;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAddServicesController extends Controller
{
    public function index(){
        $eventServices = EventService::all();
        $messageList = Message::where('userId' , auth()->user()->id);

        $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();
        return view('user.add-services', compact('eventServices', 'messageList', 'messages'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'budget' => 'required',
            'description' => 'required',
            'highlight' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('eventServices'), $imageName);

        $id = auth()->user()->id;
        $name = $request->name;
        $location = $request->location;
        $lga = $request->lga;
        $eventservice = $request->eventservice;
        $budget = $request->budget;
        $capacity = $request->capacity;
        $description = $request->description;
        $highlight = $request->highlight;
        $h2 = $request->hightlight2;
        $h3 = $request->hightlight3;

        $eventId = DB::table('event_services')
        ->WHERE('event','=', $eventservice)
        ->get();

        $EId = $eventId[0]->id;

        $eventList = new EventServiceList();
        $eventList->user_id = $id;
        $eventList->name = $name;
        $eventList->location = $location;
        $eventList->lga = $lga;
        $eventList->eventservice = $eventservice;
        $eventList->budget = $budget;
        $eventList->capacity = $capacity;
        $eventList->description = $description;
        $eventList->h1 = $highlight;
        $eventList->h2 = $h2;
        $eventList->h3 = $h3;
        $eventList->event_type_id = $EId;
        $eventList->image = $imageName;
        $eventList->save();
        return back()->with('status', 'Added!');
    }
}
