<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendingAdsController extends Controller
{
    public function index($id){

        Listings::find($id)->increment('views');

        $trendingAds = Listings::find($id);
        $exact = $trendingAds->user_id;
        $listings = Listings::all();


        $usersInfo = DB::select('select * from users where id = ?', [$exact]);
        return view('trending-ads' , compact('trendingAds', 'usersInfo', 'listings'));
    }
}
