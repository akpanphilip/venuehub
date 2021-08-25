<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use Illuminate\Http\Request;

class ManageListingsController extends Controller
{
    public function approveListing($id)
    {
        $approve = Listings::find($id);

        if ($approve) {
            $approve->status = '1';
            $approve->save();
            return back()->with('approvedListing', 'Venue successfully approved!');
        }
    }
    public function disapproveListing($id)
    {
        $disapprove = Listings::find($id);

        if ($disapprove) {
            $disapprove->status = '0';
            $disapprove->save();
            return back()->with('disapprovedListing', 'Venue successfully disapproved!');
        }
    }
    public function deleteVenue($id)
    {
        $delete = Listings::find($id);

        $delete->delete();

        return back()->with('deletedVenue', 'Venue deleted successfully!');
    }
}
