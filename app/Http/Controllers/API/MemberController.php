<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\API\Members;

class MemberController extends Controller
{
    public function MemberDetail(Request $request){
        $data = Members::find($request->uid);
        if($data)
            return response()->json(['error' => false, 'message' => 'Data found', 'data' => $data], 200);
        return response()->json(['error' => true, 'message' => 'Data not found', 'data' => $data], 401);        
    }
}
