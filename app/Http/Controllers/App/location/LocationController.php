<?php

namespace App\Http\Controllers\App\location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;

class LocationController extends Controller
{
	
    public function getLocation(Request $request)
    {
        $states = Location::where("country_id",$request->country_id)
                    ->pluck("state","id");
        return response()->json($states);
    }

}
