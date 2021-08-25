<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use App\Models\Listings;
use App\Models\Message;
use App\Models\Package;
use App\Models\VenueType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserListingsController extends Controller
{
    public function index()
    {
        $cnt = 1;
        $id = auth()->user()->id;
        $listings = Listings::query()
            ->where('user_id', '=', $id)
            ->get();
        $total = Listings::query()
            ->where('user_id', '=', $id)
            ->count();
            $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();

        $messageList = Message::where('userId', auth()->user()->id);

        return view('user.listings', compact('listings', 'cnt', 'total', 'messageList', 'messages'));
    }
    public function addListings()
    {
        $messageList = Message::where('userId' , auth()->user()->id);
        $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();

        $venueTypes = VenueType::all();
        $packages = Package::all();
        $eventTypes = EventType::all();
        return view(
            'user.add-listings',
            compact('venueTypes', 'packages', 'eventTypes', 'messageList', 'messages')
        );
    }
    public function storeListings(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'type' => 'required|string',
            'description' => 'required|max:500',
            'price' => 'required|max:50',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'alt_image_2' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'alt_image_3' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'alt_image_4' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = rand(100000, 999999) . '.' . $request->image->extension();
        $request->image->move(public_path('listingImages'), $imageName);

        $imageName2 =
            rand(100000, 999999) . '.' . $request->alt_image_2->extension();
        $request->alt_image_2->move(public_path('listingImages'), $imageName2);

        $imageName3 =
            rand(100000, 999999) . '.' . $request->alt_image_3->extension();
        $request->alt_image_3->move(public_path('listingImages'), $imageName3);

        $imageName4 =
            rand(100000, 999999) . '.' . $request->alt_image_4->extension();
        $request->alt_image_4->move(public_path('listingImages'), $imageName4);

        $id = auth()->user()->id;

        $name = $request->name;
        $type = $request->type;
        $people = $request->people;
        $package = $request->package;
        $event = $request->event;
        $price = $request->price;
        $state = $request->state;
        $lga = $request->lga;
        $description = $request->description;
        $user_id = $id;


        $venueTypeId = DB::table('venue_types')
        ->WHERE('venue_type','=',$type)
        ->get();

        $venueId = $venueTypeId[0]->id;

        $listings = new Listings();
        $listings->name = $name;
        $listings->type = $type;
        $listings->image = $imageName;
        $listings->people = $people;
        $listings->package = $package;
        $listings->event = $event;
        $listings->state = $state;
        $listings->lga = $lga;
        $listings->user_id = $user_id;
        $listings->description = $description;
        $listings->minimum_price = $price;
        $listings->venue_type_id = $venueId;
        $listings->image2 = $imageName2;
        $listings->image3 = $imageName3;
        $listings->image4 = $imageName4;
        $listings->save();

        return back()->with('status', 'Added!', 'selectTypeErr');
    }
}
