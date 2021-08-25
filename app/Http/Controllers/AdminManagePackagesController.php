<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class AdminManagePackagesController extends Controller
{

    public function deletePackage($id){
        $deletePackage = Package::find($id);

        $deletePackage->delete();

        return back()->with('deletedPackage', 'Venue deleted successfully!');
    }

    public function editPackage($id)
    {
        $packages = Package::find($id);

        return view('admin.manage-package.edit', compact('packages'));
    }
    public function updatePackage(Request $request){
        $this->validate($request, [
            'name' => 'required|max:50',
            'price' => 'required|max:20,'
        ]);

        $name = $request->name;
        $price = $request->price;

        $package = Package::find($request->id);

        $package->package_name = $name;
        $package->package_price = $price;

        $package->save();
        return back()->with('packageUpdated', 'Successfully Updated!');

    }

}
