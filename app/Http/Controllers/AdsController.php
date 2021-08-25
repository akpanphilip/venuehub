<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index(){
        $ads = Ad::all();
        return view('admin.ads', compact('ads'));
    }
    public function upload(Request $request){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = rand(100000, 999999) . '.' . $request->image->extension();
        $request->image->move(public_path('adsImages'), $imageName);
        $ads = new Ad();
        $ads->image = $imageName;
        $ads->save();
        return back()->with('status', 'Added successfully');
    }
    public function deleteAds($id){

        $ads = Ad::find($id);
        unlink(public_path('adsImages') . '/' . $ads->image);
        $ads->delete();
        return back()->with('adDeleted', 'Deleted successfully!');

    }
}

