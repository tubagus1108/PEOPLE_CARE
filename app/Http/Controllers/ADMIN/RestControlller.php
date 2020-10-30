<?php

namespace App\Http\Controllers\ADMIN;

use App\Models\Admin\Firefighters;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Hospital;
use Datatables;
use Carbon\Carbon;

use function PHPSTORM_META\type;

class RestControlller extends Controller
{
    // Hospital
    public function hospitalData(Request $request){
        $hospital = Hospital::where('deleted_at',null)->get();
        if(!$request->all())
            return view('hospital.hospital',compact('hospital'));
        else{
            $insert = $request->validate([
                'name' => 'required|unique:rest,name|min:2',
                'latitude' => 'required|unique:rest,latitude|min:2',
                'longtitude' => 'required|unique:rest,longtitude|min:2',
                
            ]);
            $insert = Hospital::create($request->all());
            if($insert)
                return redirect(route('hospital'))->with('success', 'Success stored new hospital data');
            return redirect(route('hospital'))->with('failed', 'failed stored new hospital data');
        }
    }
    public function hospitalDatatable(){
        $data = Hospital::where('deleted_at',null)->get();

        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            $delete_link = "'".url('hospital/hospital-delete/'.$data['id'])."'";
            $delete_message = "'This cannot be undo'";
            $edit_link = "'".url('hospital/'.$data['id'].'/hospital-edit')."'";

            $edit = '<button  key="'.$data['id'].'"  class="btn btn-info text-white" data-toggle="modal" data-target="#editHospital" onclick="editHospital('.$edit_link.')"> <i class="fa fa-edit"> </i> </button>';
            $delete = '<button onclick="confirm_me('.$delete_message.','.$delete_link.')" class="btn btn-danger text-white"> <i class="fa fa-trash"> </i> </button>';
            return $edit.' '.$delete;
        })
        ->addColumn('created_at', function($data){
            return Carbon::parse($data['created_at'])->format('F d, y');
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function hospitalDelete($id){
        $data = Hospital::find($id);
        if($data->delete())
            return redirect(url('hospital/hospital-data'))->with('success','Success delete hospital');
        return redirect(url('hospital/hospital-data'))->with('failed','Failed delete hospital');
    }
    public function hospitalEdit($id){
        $data = Hospital::find($id);
        return view('hospital.ajax-hospital-edit', compact('data'));
    }
    public function hospitalEditExecute(Request $request){
        $data = $request->validate([
            'name' => 'required|unique:rest,name|min:2',
            'address' => 'required|unique:rest,name|min:2',
            
        ]);
        $data = Hospital::find($request->id);
        $data->name = $request->name;
        $data->address = $request->address;
        if($data->save())
            return redirect(url('hospital/hospital-data'))->with('success','successfully changed data hospital ' .$data['name']);
        return redirect(url('hospital/'.$request->id.'/hospital-edit'))->with('failed','failed to change data hospital' .$data['name']);
    }

    // Firefighters
    public function firefightersData(Request $request){
        $firefighters = Firefighters::where('deleted_at',null)->get();
        if(!$request->all())
            return view('firefighters.firefighters',compact('firefighters'));
        else{
            $insert = $request->validate([
                'name' => 'required|unique:rest,name|min:2',
                'latitude' => 'required|unique:rest,latitude|min:2',
                'longtitude' => 'required|unique:rest,longtitude|min:2',
                
            ]);
            $insert = Firefighters::create($request->all());
            if($insert)
                return redirect(route('firefighters'))->with('success', 'Success stored new firefighters data');
            return redirect(route('firefighters'))->with('failed', 'failed stored new firefighters data');
        }
    }
    public function firefightersDatatable(){
        $data = Firefighters::where('deleted_at',null)-> where('type',2)->get();

        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            $delete_link = "'".url('firefighters/firefighters-delete/'.$data['id'])."'";
            $delete_message = "'This cannot be undo'";
            $edit_link = "'".url('firefighters/'.$data['id'].'/firefighters-edit')."'";

            $edit = '<button  key="'.$data['id'].'"  class="btn btn-info text-white" data-toggle="modal" data-target="#editFirefighters" onclick="editFirefighters('.$edit_link.')"> <i class="fa fa-edit"> </i> </button>';
            $delete = '<button onclick="confirm_me('.$delete_message.','.$delete_link.')" class="btn btn-danger text-white"> <i class="fa fa-trash"> </i> </button>';
            return $edit.' '.$delete;
        })
        ->addColumn('created_at', function($data){
            return Carbon::parse($data['created_at'])->format('F d, y');
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function firefightersDelete($id){
        $data = Firefighters::find($id);
        if($data->delete())
            return redirect(url('firefighters/firefighters-data'))->with('success','Success delete firefighters');
        return redirect(url('firefighters/firefighters-data'))->with('failed','failed delete firefighters');
    }
    public function firefightersEdit($id){
        $data = Firefighters::find($id);
        return view('firefighters.ajax-firefighters-edit',compact('data'));
    }
    public function firefightersEditExecute(Request $request){
        $data = $request->validate([
            'name' => 'required|unique:rest,name|min:2',
            'address' => 'required|unique:rest,name|min:2',
        ]);
        $data = Firefighters::find($request->id);
        $data->name = $request->name;
        $data->address = $request->address;
        if($data->save())
            return redirect(url('firefighters/firefighters-data'))->with('success','successfully changed data firefighters ' .$data['name']);
        return redirect(url('firefighters/'.$request->id.'/firefighters-edit'))->with('failed','failed to change data firefighters' .$data['name']);
    }
}
