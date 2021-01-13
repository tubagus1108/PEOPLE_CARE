<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\PeopleMembers;
use App\Models\API\Members;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(Request $request){
        $user = Members::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $data['token'] = $user->createToken('nApp')->accessToken;
                $data['uid'] = $user->uid;
                $data['name'] = $user->full_name;
                $data['email'] = $user->email;
                $data['national_id'] = $user->national_id;
                return response()->json(['error' => false, 'message' => 'Login success !', 'data' => $data], 200);
            }
            return response()->json(['error' => true, 'message' => 'Password is wrong'], 401);
        }
        return response()->json(['error' => true, 'message' => 'Email not found !'], 401);
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'national_id' => 'required|unique:members,national_id',
            'full_name' => 'required',
            'email'     => 'required|email|unique:members,email',
            'password' => 'required',
            'phone' => 'required|unique:members,phone'
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = PeopleMembers::create($input);
        $data['token'] =  $user->createToken('nApp')->accessToken;
        $data['name'] =  $user->name;
        return response()->json(['error' => false, 'message' => 'Register success !', 'data' => $data], 200);


    }

    
}
