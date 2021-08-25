<?php

namespace App\Http\Controllers;

use App\Models\NeedHelp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NeedHelpController extends Controller
{
    public function index()
    {
        return view('venue-concierge');
    }
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'firstname' => 'required|max:255',
        //     'lastname' => 'required|max:255',
        //     'email' => 'required|email|max:255',
        //     'mobile' => 'required',
        //     'budget' => 'required',
        //     'guests' => 'required',
        //     'date' => 'required',
        //     'time' => 'required',
        //     'duration' => 'required',
        //     'location' => 'required',
        //     'requirement' => 'required',
        // ]);

        // NeedHelp::create([
        //     'firstname' => $request->firstname,
        //     'lastname' => $request->lastname,
        //     'email' => $request->email,
        //     'mobile' => $request->mobile,
        //     'budget' => $request->budget,
        //     'guests' => $request->guests,
        //     'date' => $request->date,
        //     'time' => $request->time,
        //     'duration' => $request->duration,
        //     'location' => $request->location,
        //     'requirement' => $request->requirement,
        // ]);
        // return \redirect()
        //     ->route('venue-concierge')
        //     ->with('sentSuccessfully', 'Successfully sent!');
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required',
            'budget' => 'required',
            'guests' => 'required',
            'date' => 'required',
            'time' => 'required',
            'duration' => 'required',
            'location' => 'required',
            'requirement' => 'required',
        ]);

        if (!$validator->fails()) {
            NeedHelp::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'budget' => $request->budget,
                'guests' => $request->guests,
                'date' => $request->date,
                'time' => $request->time,
                'duration' => $request->duration,
                'location' => $request->location,
                'requirement' => $request->requirement,
            ]);
            return response()->json(['success' => 'Added new records.']);
        }
        return response()->json(['error' => $validator->errors()]);
    }
}
