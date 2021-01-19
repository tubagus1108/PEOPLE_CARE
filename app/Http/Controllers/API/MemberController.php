<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\API\Members;
use App\Models\API\Adds;

class MemberController extends Controller
{
    public function MemberDetail(Request $request){
        $data = Members::find($request->uid);
        if($data)
            return response()->json(['error' => false, 'message' => 'Data found', 'data' => $data], 200);
        return response()->json(['error' => true, 'message' => 'Data not found', 'data' => $data], 401);        
    }

    public function adds(){
        $data = Adds::all();
        if($data)
            return response()->json(['error' => false, 'message' => 'success retrive data', 'data' => $data], 200);
        return response()->json(['error' => true, 'message' => 'data not found', 'data' => $data], 401);
    }
    public function addsCreate(Request $request){
        $data = Adds::create($request->all());
        if($data)
            return response()->json(['error' => false, 'message' => 'succes insert data', 'data' => $data],200);
        return response()->json(['error' => false, 'message' => 'error insert data', 'data' => $data],401);
    }
    public function addsUpdate(Request $request, $id){
        $data = Adds::firstWhere('id', $id);
        if($data){
            $data = Adds::find($id);
            $data->title = $request->title;
            $data->description = $request->description;
            $data->image = $request->image;
            $data->save();
            return response()->json(['error' => false, 'message' => 'succes update data', 'data' => $data],200);
        } else {
            return response()->json(['error' => false, 'message' => 'NotFound data', 'data' => $data],404);
        }
    }
    public function addsDelete($id){
        $data = Adds::firstWhere('id', $id);
        if($data){
            Adds::destroy($id);
            return response()->json(['error' => false, 'message' => 'succes delete data', 'data' => $data],200);
        }
        else{
            return response()->json(['error' => false, 'message' => 'NotFound data', 'data' => $data],404);
        }
    }

}
