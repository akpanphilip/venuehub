<?php

namespace App\Http\Controllers;

use App\Models\CallRequest;
use App\Models\Listings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $callRequestCount = CallRequest::where('mobile', '!=', '')->count();
        $activeUsers = User::where('status', '=', '1')->count();
        $inactiveUsers = User::where('status', '=', '0')->count();
        $listCount = Listings::where('status', '=', '1')->count();
        $allUsers = User::all()->count();
        return view('admin.index', compact('callRequestCount', 'activeUsers', 'allUsers', 'inactiveUsers', 'listCount'));
    }

    public function manageUsers()
    {
        $cnt = 1;
        $users = DB::select('SELECT * FROM users WHERE status != "2" ');

        return view('admin.manage-users', compact('cnt', 'users'));
    }

    public function manageServices()
    {
        return view('admin.manage.services');
    }
    public function editProfile(){
        return view('admin.edit-profile');
    }
    public function updateAvatar(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $id = auth()->user()->id;

        $user = User::find($id);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('userImages'), $imageName);

        $user->image = $imageName;

        $user->save();
        return back()->with('image_updated', 'Image successfully updated!');
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

}
