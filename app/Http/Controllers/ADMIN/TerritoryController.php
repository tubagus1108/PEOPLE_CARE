<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Province;
use App\Models\Admin\City;
use DataTables;

class TerritoryController extends Controller
{
    // Province
    public function province(Request $request){
        $province = Province::where('deleted_at',null)->get();
        if(!$request->all())
            return view('territory.province', compact('province'));
        else{
            $insert = Province::create($request->all());
            if($insert)
                return redirect(route('province'))->with('success', 'Success stored new province data');
            
        }
    }
    public function city(Request $request){
        $province = Province::where('deleted_at',null)->get();
        $city = City::where('deleted_at',null)->get();
        if(!$request->all())
            return view ('territory.city', compact('province', 'city'));
            
        else{
            $insert = City::create($request->all());
            if($insert)
                return redirect(route('city'))->with('success', 'Success stored new city data');
        }
    }
    public function provinceDelete($id){
        $data = Province::find($id);
        if($data->delete())
            return redirect(url('territory/province'))->with('success','Success delete Province');
        return redirect(url('territory/province'))->with('failed','Failed delete Province');
    }
    public function pedit($id){
        return ('hello');
        

    }
    public function cityDelete(Request $request){
        $data = City::find($request->id);
        if($data->delete())
            return redirect(url('territory/city'))->with('success','Success delete Province');
        return redirect(url('territory/city'))->with('failed','Failed delete Province');
    }
}
