<?php

namespace App\Http\Controllers;

use App\Models\EventService;
use App\Models\EventServiceList;
use App\Models\Message;
use Illuminate\Http\Request;

class UserMyServiceController extends Controller
{
    public function index()
    {
        $cnt = 1;
        $id = auth()->user()->id;
        $services = EventServiceList::query()
            ->where('user_id', '=', $id)
            ->get();
        $total = EventServiceList::query()
            ->where('user_id', '=', $id)
            ->count();
        $messageList = Message::where('userId', auth()->user()->id);

        $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();
        return view('user.my-services', compact('services', 'cnt', 'total', 'messageList', 'messages'));
    }
    public function editService($id)
    {
        $messageList = Message::where('userId', auth()->user()->id);

        $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();

        $item = EventServiceList::find($id);

        $eventServices = EventService::all();

        return view('user/edit-service', compact('item', 'eventServices', 'messageList', 'messages'));
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
    public function deleteService($id)
    {
        $event = EventServiceList::find($id);

        $event->delete();

        return back()->with('eventDeleted', 'Deleted successfully!');
    }
}
