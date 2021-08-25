<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminManageUserController extends Controller
{
    public function enableUser($id)
    {
        $enable = User::find($id);

        if ($enable) {
            $enable->status = '1';
            $enable->save();
            return back()->with('acitveUser', 'User account activated!');
        }
    }
    public function disableUser($id)
    {
        $disable = User::find($id);

        if ($disable) {
            $disable->status = '0';
            $disable->save();
            return back()->with('disabledUser', 'User account successfully disabled!');
        }
    }
    public function deleteUser($id)
    {
        $deleteUser = User::find($id);

        $deleteUser->delete();

        return back()->with('deletedUser', 'User account deleted successfully!');
    }
    public function editUser($id){

        $userInfo = User::find($id);

        return view('admin.manage-edit-user', compact('userInfo'));

    }
    public function updateEmail(Request $request){
        $this->validate($request, [
            'email' => 'required|email|max:50|unique:users',
        ]);

        $id = $request->id;
        $email = $request->email;

        $user = User::find($id);
        $user->email = $email;

        $user->save();
        return back()->with('status_email', 'Email successfully updated!');

    }
    public function updateMobile(Request $request){
        $this->validate($request, [
            'mobile' => 'required|max:50|unique:users',
        ]);

        $id = $request->id;
        $mobile = $request->mobile;

        $user = User::find($id);
        $user->mobile = $mobile;

        $user->save();
        return back()->with('status_mobile', 'Contact successfully updated!');

    }
    public function updatePackage(Request $request){
        $this->validate($request, [
            'package' => 'required|integer',
        ]);

        $id = $request->id;
        $package = $request->package;

        $user = User::find($id);
        $user->package = $package;

        $user->save();
        return back()->with('status_package', 'Package successfully updated!');

    }
}
