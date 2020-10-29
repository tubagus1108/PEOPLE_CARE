<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Province;
use App\Models\Admin\City;
use Datatables;
use Dotenv\Validator;
use Carbon\Carbon;

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
    public function provinceDatatable(){
        $data = Province::where('deleted_at',null)->get();

        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            $delete_link = "'".url('territory/province-delete/'.$data['id'])."'";
            $delete_message = "'This cannot be undo'";
            $edit_link = "'".url('territory/'.$data['id'].'/province-edit')."'";

            $edit = '<button  key="'.$data['id'].'"  class="btn btn-info text-white" data-toggle="modal" data-target="#editProvince" onclick="editProvince('.$edit_link.')"> <i class="fa fa-edit"> </i> </button>';
            $delete = '<button onclick="confirm_me('.$delete_message.','.$delete_link.')" class="btn btn-danger text-white"> <i class="fa fa-trash"> </i> </button>';
            return $edit.' '.$delete;
        })
        ->addColumn('created_at', function($data){
            return Carbon::parse($data['created_at'])->format('F d, y');
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function provinceDelete($id){
        $data = Province::find($id);
        if($data->delete())
            return redirect(url('territory/province'))->with('success','Success delete Province');
        return redirect(url('territory/province'))->with('failed','Failed delete Province');
    }
    public function provinceEdit($id){
        $data = Province::find($id);
        return view('territory.ajax-province-edit', compact('data'));
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
    public function cityDatatable(){
        $data = City::where('deleted_at',null)->get();

        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            $delete_link = "'".url('territory/city-delete/'.$data['id'])."'";
            $delete_message = "'This cannot be undo'";
            $edit_link = "'".url('territory/'.$data['id'].'/city-edit')."'";
            
            $edit = '<button  key="'.$data['id'].'"  class="btn btn-info text-white" data-toggle="modal" data-target="#editCity" onclick="editCity('.$edit_link.')"> <i class="fa fa-edit"> </i> </button>';
            $delete = '<button onclick="confirm_me('.$delete_message.','.$delete_link.')" class="btn btn-danger text-white"> <i class="fa fa-trash"> </i> </button>';
            return $edit.' '.$delete;
        })
        ->addColumn('created_at', function($data){
            return Carbon::parse($data['created_at'])->format('F d, y');
        })
        ->rawColumns(['action'])
        ->make(true);
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
        return view('territory.ajax-city-edit', compact('data', 'province'));
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
