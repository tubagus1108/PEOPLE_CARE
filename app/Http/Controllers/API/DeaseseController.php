<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Deasese;

class DeaseseController extends Controller
{
    public function getalldata(){
        $data = Deasese::all();
        if($data)
            return response()->json(['error' => false, 'message' => 'data found', 'data' => $data],200);
        return response()->json(['error' => false, 'message' => 'data not found', 'data' => $data],401);
    }
    public function CreateDeasese(Request $request){
        $data = Deasese::create($request->all());
        if($data)
            return response()->json(['error' => false, 'message' => 'data found', 'data' => $data],200);
        return response()->json(['error' => false, 'message' => 'data not found', 'data' => $data],401); 
    }
    
}
