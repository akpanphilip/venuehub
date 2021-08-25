<?php

namespace App\Http\Controllers;

use App\Models\CallRequest;
use App\Models\EventType;
use App\Models\Listings;
use App\Models\Message;
use App\Models\Package;
use App\Models\User;
use App\Models\VenueType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    public function index()
    {
        // $id = auth()->user()->id;

        $messageList = Message::where('userId', auth()->user()->id);

        $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();

        $listings = Listings::all();
        if (auth()->user()->status == '1') {
            return view(
                'user.index',
                compact('listings', 'messageList', 'messages')
            );
        } elseif (auth()->user()->status == '2') {
            $callRequestCount = CallRequest::where('mobile', '!=', '')->count();
            $activeUsers = User::where('status', '=', '1')->count();
            $inactiveUsers = User::where('status', '=', '0')->count();
            $listCount = Listings::where('status', '=', '1')->count();
            return view(
                'admin.index',
                compact(
                    'callRequestCount',
                    'activeUsers',
                    'inactiveUsers',
                    'listCount'
                )
            );
        }
    }
    public function editProfileView()
    {
        $messageList = Message::where('userId', auth()->user()->id);
        $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();

        return view('user.edit-profile', compact('messageList', 'messages'));
    }
    public function updateUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'mobile' => 'required|max:25',
        ]);

        $id = auth()->user()->id;
        $username = $request->name;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $mobile = $request->mobile;

        $user = User::find($id);
        $user->name = $username;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->mobile = $mobile;

        $user->save();

        return back()->with('status', 'Successfully Updated!');
    }
    public function updateEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:50|unique:users',
        ]);

        $id = auth()->user()->id;
        $email = $request->email;

        $user = User::find($id);
        $user->email = $email;

        $user->save();
        return back()->with('status_email', 'Email successfully updated!');
    }
    public function updateAvatar(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $id = auth()->user()->id;

        $user = User::find($id);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('userImages'), $imageName);

        $user->image = $imageName;

        $user->save();
        return back()->with('image_updated', 'Image successfully updated!');
    }
    public function editVenue($id)
    {
        $messageList = Message::where('userId', auth()->user()->id);
        $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();

        $item = Listings::find($id);

        $venueTypes = VenueType::all();

        $packages = Package::all();

        $eventTypes = EventType::all();

        return view(
            'user/edit-listing',
            compact(
                'item',
                'venueTypes',
                'packages',
                'eventTypes',
                'messages',
                'messageList'
            )
        );
    }
    public function updateVenueName(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
        ]);
        $name = $request->name;

        $venue = Listings::find($request->id);
        $venue->name = $name;

        $venue->save();
        return back()->with('venueNameUpdated', 'Venue name updated!');
    }
    public function updateVenueType(Request $request)
    {
        $type = $request->type;

        $venue = Listings::find($request->id);
        $venue->type = $type;

        $venue->save();
        return back()->with('venueTypeUpdated', 'Venue type updated!');
    }
    public function updatePeople(Request $request)
    {
        $people = $request->people;

        $venue = Listings::find($request->id);
        $venue->people = $people;

        $venue->save();
        return back()->with('venuePeople', 'Number of people updated!');
    }
    public function updateEvent(Request $request)
    {
        $event = $request->event;

        $venue = Listings::find($request->id);
        $venue->event = $event;

        $venue->save();
        return back()->with('venueEvent', 'Venue event updated!');
    }
    public function updateVenueState(Request $request)
    {
        $state = $request->state;

        $lga = $request->lga;

        $venue = Listings::find($request->id);
        $venue->state = $state;
        $venue->lga = $lga;

        $venue->save();
        return back()->with('venueState', 'Venue event updated!');
    }
    public function updateVenueImage1(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = rand(100000, 999999) . '.' . $request->image->extension();
        $request->image->move(public_path('listingImages'), $imageName);

        $venue = Listings::find($request->id);
        $venue->image = $imageName;

        $venue->save();
        return back()->with('image-1', 'Image updated!');
    }
    public function updateVenueImage2(Request $request)
    {
        $this->validate($request, [
            'image_2' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName =
            rand(100000, 999999) . '.' . $request->image_2->extension();
        $request->image_2->move(public_path('listingImages'), $imageName);

        $venue = Listings::find($request->id);
        $venue->image2 = $imageName;

        $venue->save();
        return back()->with('image_2', 'Image updated!');
    }
    public function updateVenueImage3(Request $request)
    {
        $this->validate($request, [
            'image_3' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName =
            rand(100000, 999999) . '.' . $request->image_3->extension();
        $request->image_3->move(public_path('listingImages'), $imageName);

        $venue = Listings::find($request->id);
        $venue->image3 = $imageName;

        $venue->save();
        return back()->with('image_3', 'Image updated!');
    }
    public function updateVenueImage4(Request $request)
    {
        $this->validate($request, [
            'image_4' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName =
            rand(100000, 999999) . '.' . $request->image_4->extension();
        $request->image_4->move(public_path('listingImages'), $imageName);

        $venue = Listings::find($request->id);
        $venue->image4 = $imageName;

        $venue->save();
        return back()->with('image_4', 'Image updated!');
    }
    public function updateDescription(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|max:250',
        ]);

        $description = $request->description;

        $venue = Listings::find($request->id);
        $venue->description = $description;

        $venue->save();
        return back()->with('description', 'Description updated!');
    }
    public function deleteVenue($id)
    {
        $venue = Listings::find($id);
        unlink(public_path('listingImages') . '/' . $venue->image);
        $venue->delete();
        return back()->with('venueDeleted', 'Deleted successfully!');
    }
}
