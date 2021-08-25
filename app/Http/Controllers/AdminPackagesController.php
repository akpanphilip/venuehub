<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class AdminPackagesController extends Controller
{
    public function index()
    {
        $cnt = 1;
        $packages = Package::all();
        return view('admin.manage-packages', compact('packages', 'cnt'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'package' => 'required|max:50',
            'price' => 'required|max:50',

        ]);
        Package::create([
            'package_name' => $request->package,
            'package_price' => $request->price,
        ]);
        return back()->with('status', 'PACKAGE ADDED SUCCESSFULLY!');
    }
}
