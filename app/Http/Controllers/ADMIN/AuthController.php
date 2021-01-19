<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showFormLogin (){
        if (Auth::check()) {
            return redirect()->route('my-dashboard');
        }
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email is required',
            'email.email'           => 'Invalid email',
            'password.required'     => 'Password is required',
            'password.string'       => 'The password must be a string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'  => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) {
            return redirect()->route('my-dashboard');

        } else { // false

            //Login Fail
            Session::flash('error', 'Incorrect email or password');
            return redirect()->route('login');
        }


    }
    // REGISTER
    public function showFormRegister()
    {
        if (Auth::check()) {
            return redirect()->route('my-dashboard');
        }
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:admin,email',
            'password'              => 'required|confirmed'
        ];

        $messages = [
            'name.required'         => 'Full name is required',
            'name.min'              => 'Full name of at least 3 characters',
            'name.max'              => 'Full name up to 35 characters',
            'email.required'        => 'Email is required',
            'email.email'           => 'Invalid email',
            'email.unique'          => 'Email already registered',
            'password.required'     => 'Password is required',
            'password.confirmed'    => 'Password is not the same as confirmation password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $admin = new Admin;
        $admin->name = ucwords(strtolower($request->name));
        $admin->username = ucwords(strtolower($request->username));
        $admin->email = strtolower($request->email);
        $admin->password = Hash::make($request->password);
        $admin->phone = ($request->phone);
        $admin->national_id = '-';
        $simpan = $admin->save();

        if($simpan){
            Session::flash('success', 'Register successful! Please login to access data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register failed! Please try again later']);
            return redirect()->route('register');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'))->with('success', 'Success logout');
    }

}
