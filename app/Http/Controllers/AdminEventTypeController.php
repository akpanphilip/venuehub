<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;

class AdminEventTypeController extends Controller
{
    public function index()
    {
        $cnt = 1;
        $eventTypes = EventType::all();
        return view('admin.manage-events', compact('cnt', 'eventTypes'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'event' => 'required|max:255',
        ]);
        EventType::create([
            'event_type' => $request->event,
        ]);
        return back()->with('status', 'EVENT ADDED SUCCESSFULLY!');
    }
}
