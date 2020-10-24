<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    // Admin Login -> Response to client ['Admin UID', 'API Token', 'Login Time']
    public function AdminLogin(Request $request){
        $admin = Admin::where('username',$request->username)->first();
        if($admin){
            if(Hash::check($request->password, $admin->password)){
                $data['token'] = $admin->createToken('nApp')->accessToken;
                $data['uid'] = $admin->uid;
                return response()->json(['error' => false, 'message' => 'Login success !', 'data' => $data], 200);
            }
            return response()->json(['error' => true, 'message' => 'Password is wrong'], 401);
        }
        return response()->json(['error' => true, 'message' => 'Username not found !'], 401);
    }
}
