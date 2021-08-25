<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpgradePackageController extends Controller
{
    public function index(){
        $messageList = Message::where('userId' , auth()->user()->id);

        $messages = Message::query()
            ->where('userId', '=', auth()->user()->id)
            ->get();
        $firstPackage = DB::select('select * from packages where id = ?', [1]);
        $secondPackage = DB::select('select * from packages where id = ?', [2]);
        $thirdPackage = DB::select('select * from packages where id = ?', [3]);
        $fourthPackage = DB::select('select * from packages where id = ?', [5]);
        $fifthPackage = DB::select('select * from packages where id = ?', [6]);
        return view('user.upgrade-package', compact('firstPackage', 'secondPackage', 'thirdPackage', 'fourthPackage', 'fifthPackage', 'messageList', 'messages'));
    }
    public function verify ($reference){
        $sec = "sk_test_7fbc14a9ef6cbd405e8669b66f67ba0e0c9ce3a2";

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,

          //   working offline, next two lines to be removed on production
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,

          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $sec",
            "Cache-Control: no-cache",
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $new_data = json_decode($response);

        return [$new_data];
    }
}
