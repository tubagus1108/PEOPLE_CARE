<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Province;
use App\Models\Admin\City;
use DataTables;
use Dotenv\Validator;

class TerritoryController extends Controller
{
    // Province
    public function province(Request $request){
        $province = Province::where('deleted_at',null)->get();
        if(!$request->all())
            return view('territory.province', compact('province'));
        else{
            $insert = $request->validate([
                'name' => 'required|unique:province,name|max:30|min:2,'
            ]);
            $insert = Province::create($request->all());
            if($insert)
                return redirect(route('province'))->with('success', 'Success stored new province data');
            return redirect(route('province'))->with('failed', 'failed stored new province data');
        }
    }
    public function provinceDelete($id){
        $data = Province::find($id);
        if($data->delete())
            return redirect(url('territory/province'))->with('success','Success delete Province');
        return redirect(url('territory/province'))->with('failed','Failed delete Province');
    }
    public function provinceEdit($id){
        $data = Province::find($id);
        return view('territory.province-edit', compact('data'));
    }
    public function provinceEditExecute(Request $request){
        $data = $request->validate([
            'name' => 'required|max:30|min:2,'
        ]);
        $data = Province::find($request->id);
        $data->name = $request->name;
        if($data->save())
            return redirect(url('territory/province'))->with('success','successfully changed data province ' .$data['name']);
        return redirect(url('territory/'.$request->id.'/province-edit'))->with('failed','failed to change data province' .$data['name']);
    }

    // CITY
    public function city(Request $request){
        $province = Province::where('deleted_at',null)->get();
        $city = City::where('deleted_at',null)->get();
        if(!$request->all())
            return view ('territory.city', compact('province', 'city'));
            
        else{
            $insert = $request->validate([
                'name' => 'required|unique:province,name|max:30|min:2,'
            ]);
            $insert = City::create($request->all());
            if($insert)
                return redirect(route('city'))->with('success', 'Success stored new city data');
        }
    }
    public function cityDelete(Request $request){
        $data = City::find($request->id);
        if($data->delete())
            return redirect(url('territory/city'))->with('success','Success delete Province');
        return redirect(url('territory/city'))->with('failed','Failed delete Province');
    }
    public function cityEdit($id){
        $province = Province::where('deleted_at',null)->get();
        $data = City::find($id);
        return view('territory.city-edit', compact('data', 'province'));
    }
    public function cityEditExecute(Request $request){
        $data = $request->validate([
            'name' => 'required|max:30|min:2,'
        ]);
        $data = City::find($request->id);
        $data->name = $request->name;
        if($data->save())
            return redirect(url('territory/city'))->with('success','successfully changed data city ' .$data['name']);
        return redirect(url('territory/'.$request->id.'/city-edit'))->with('failed','failed changed data province ' .$data['name']);
    }
}
