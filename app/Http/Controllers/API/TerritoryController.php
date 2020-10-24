<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\City;
use App\Models\Subdistrict;

class TerritoryController extends Controller
{
    // Register Province Data
    public function ProvinceRegist(Request $request){
        if(Province::create($request->all()))
            return response()->json(['error' => false, 'message' => 'Data province is stored !'], 200);
        return response()->json(['error' => true, 'message' => 'Data province failed to stored !'], 500);
    }
}
