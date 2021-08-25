<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact-us');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if (!$validator->fails()) {
            ContactUs::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);
            return response()->json(['success' => 'Added new records.']);
        }
        return response()->json(['error' => $validator->errors()]);
    }
}
