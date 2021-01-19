<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Province;
use App\Models\Admin\City;
use App\Models\Subdistrict;

class TerritoryController extends Controller
{
    // Register Province Data
    public function ProvinceDetail(Request $request){
        $data = Province::all();
        if($data)
            return response()->json(['error' => false, 'message' => 'Data found', 'data' => $data], 200);
        return response()->json(['error' => true, 'message' => 'Data not found', 'data' => $data], 401);   
    }
    public function CityDetail(Request $request){
        $data = City::where('province_id', $request->province_id);
        if($data)
            return response()->json(['error' => false, 'message' => 'Data found', 'data' =>$data],200);
        return response()->json(['error' => false, 'message' => 'Data not found', 'data' =>$data],401);
    }
    
}
