<?php

namespace App\Http\Controllers\ADMIN;

use App\Models\Admin\Firefighters;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Hospital;
use App\Models\Admin\Employee;
use App\Models\Admin\Settings;
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
        $data = Hospital::where('deleted_at',null)-> where('type',1)->get();

        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            $delete_link = "'".url('hospital/hospital-delete/'.$data['id'])."'";
            $delete_message = "'This cannot be undo'";
            $edit_link = "'".url('hospital/'.$data['id'].'/hospital-edit')."'";
            $detail_link = "'".url('hospital/'.$data['id'].'/hospital-detail')."'";

            
            $detail = '<button onclick ="document.location.href='.$detail_link.'" class="btn btn-success p-2" > <i class="fa fa-eye"> </i> </button>';
            $edit = '<button key="'.$data['id'].'"  class="btn btn-info p-2 text-white" data-toggle="modal" data-target="#editHospital" onclick="editHospital('.$edit_link.')"> <i class="fa fa-edit"> </i> </button>';
            $delete = '<button onclick="confirm_me('.$delete_message.','.$delete_link.')" class="btn btn-danger p-2 text-white"> <i class="fa fa-trash"> </i> </button>';
            return $detail.' '.$edit.' '.$delete;
        })
        ->addColumn('created_at', function($data){
            return Carbon::parse($data['created_at'])->format('F d, y');
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function hospitalDetail($id){
        $data = Hospital::find($id);
        $employee = Settings::where('deleted_at',null)->get();
        return view('hospital.detail-hospital',compact('data' ,'employee'));
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

    // Data Pegawai Hospital
    public function pegawaiHospitalDatatable($rest_id){
        $data = Employee::where('deleted_at',null)->where('rest_id',$rest_id)->get();
        
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            $delete_link = "'".url('hospital/employee-delete/'.$data['uid'])."'";
            $delete_message = "'This cannot be undo'";
            $edit_link = "'".url('hospital/'.$data['uid'].'/employee-edit')."'";

            
            $edit = '<button key="'.$data['id'].'"  class="btn btn-info text-white" data-toggle="modal" data-target="#editPegawai" onclick="editPegawai('.$edit_link.')"> <i class="fa fa-edit"> </i> </button>';
            $delete = '<button onclick="confirm_me('.$delete_message.','.$delete_link.')" class="btn btn-danger text-white"> <i class="fa fa-trash"> </i> </button>';
            return $edit.' '.$delete;
        })
        ->addColumn('created_at', function($data){
            return Carbon::parse($data['created_at'])->format('F d, y');
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function hospitalAddPegawai(Request $request,$id){
        $data = $request->validate([
            'name' => 'required|unique:employee,name|min:2',
            'username' => 'required|unique:employee,username|min:2',
            'password' => 'required|min:2',
            'phone' => 'required|min:11|numeric',
            
        ]);
        $employee = Settings::where('deleted_at',null)->get();
        $data = Employee::where('deleted_at',null);
        if(!$request->all())
            return view('hospital.detail-hospital',compact('data', 'employee'));
        else{
            $data = Employee::find($id);
            $insert = Employee::create($request->all());
            if($insert)
                return redirect(url('hospital/{id}/hospital-add-pegawai'))->with('success', 'Success stored new hospital Pegawai');
            return redirect(url('hospital/{id}/hospital-add-pegawai'))->with('failed', 'failed stored new hospital Pegawai');
        }
    }
    public function employeeHospitalDelete($uid){
        $data = Employee::find($uid);
        if($data->delete())
            return redirect(url('hospital/'.$data['rest_id'].'/hospital-detail'))->with('success','Success Employee hospital');
        return redirect(url('hospital/'.$data['rest_id'].'/hospital-detail'))->with('failed','Failed Employee hospital');
    }
    public function employeeHospitalEdit(Request $request, $uid){
        $employee = Settings::where('deleted_at',null)->get();
        $data = Employee::find($uid);
        if(!$request->all())
            return view('hospital.ajax-edit-pegawai', compact('data', 'employee'));
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->phone = $request->phone;
        $data->position_id = $request->position_id;
        if($data->save())
            return redirect(url('hospital/'.$data['rest_id'].'/hospital-detail'))->with('success', 'Employee is Edited !');
        return redirect(url('hospital/'.$data['rest_id'].'/hospital-detail'))->with('failed', 'Employee is failed to be edited, contact developer !');
    }
    public function returnEmployee($uid){
        $data = Employee::onlyTrashed()->where('uid',$uid);
        $data->restore();
        return redirect(url('hospital/'.$data['rest_id'].'/hospital-detail'))->with('success', 'Employee is Restore !');
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
        $data = Firefighters::where('deleted_at',null)->where('type',2)->get();

        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            $delete_link = "'".url('firefighters/firefighters-delete/'.$data['id'])."'";
            $delete_message = "'This cannot be undo'";
            $edit_link = "'".url('firefighters/'.$data['id'].'/firefighters-edit')."'";
            $detail_link = "'".url('firefighters/'.$data['id'].'/firefighters-detail')."'";

            $detail = '<button onclick ="document.location.href='.$detail_link.'" class="btn btn-success p-2" > <i class="fa fa-eye"> </i> </button>';
            $edit = '<button key="'.$data['id'].'"  class="btn btn-info p-2 text-white" data-toggle="modal" data-target="#editFirefighters" onclick="editFirefighters('.$edit_link.')"> <i class="fa fa-edit"> </i> </button>';
            $delete = '<button onclick="confirm_me('.$delete_message.','.$delete_link.')" class="btn btn-danger p-2 text-white"> <i class="fa fa-trash"> </i> </button>';
            return $detail.' '.$edit.' '.$delete;
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
    public function firefightersDetail($id){
        $data = Firefighters::find($id);
        $employee = Settings::where('deleted_at',null)->get();
        return view('firefighters.detail-firefighters',compact('data','employee'));
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
     // Data Pegawai Firefighters
     public function pegawaiFirefightersDatatable($rest_id){
        $data = Employee::where('deleted_at',null)->where('rest_id',$rest_id)->get();
        
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            $delete_link = "'".url('firefighters/employee-delete/'.$data['uid'])."'";
            $delete_message = "'This cannot be undo'";
            $edit_link = "'".url('firefighters/'.$data['uid'].'/employee-edit')."'";

            
            $edit = '<button key="'.$data['id'].'"  class="btn btn-info text-white" data-toggle="modal" data-target="#editPegawai" onclick="editPegawai('.$edit_link.')"> <i class="fa fa-edit"> </i> </button>';
            $delete = '<button onclick="confirm_me('.$delete_message.','.$delete_link.')" class="btn btn-danger text-white"> <i class="fa fa-trash"> </i> </button>';
            return $edit.' '.$delete;
        })
        ->addColumn('created_at', function($data){
            return Carbon::parse($data['created_at'])->format('F d, y');
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function firefightersAddPegawai(Request $request,$id){
        $data = $request->validate([
            'name' => 'required|unique:employee,name|min:2',
            'username' => 'required|unique:employee,username|min:2',
            'password' => 'required|min:2',
            'phone' => 'required|min:11|numeric',
            
        ]);
        $employee = Settings::where('deleted_at',null)->get();
        $data = Employee::where('deleted_at',null);
        if(!$request->all())
            return view('firefighters.detail-firefighters',compact('data', 'employee'));
        else{
            $data = Employee::find($id);
            $insert = Employee::create($request->all());
            if($insert)
                return redirect(url('firefighters/{id}/firefighters-add-pegawai'))->with('success', 'Success stored new hospital Pegawai');
            return redirect(url('firefighters/{id}/firefighters-add-pegawai'))->with('failed', 'failed stored new hospital Pegawai');
        }
    }
    public function employeeFirefightersDelete($uid){
        $data = Employee::find($uid);
        if($data->delete())
            return redirect(url('firefighters/'.$data['rest_id'].'/firefighters-detail'))->with('success','Success Employee hospital');
        return redirect(url('firefighters/'.$data['rest_id'].'/firefighters-detail'))->with('failed','Failed Employee hospital');
    }
    public function employeeFirefightersEdit(Request $request, $uid){
        $employee = Settings::where('deleted_at',null)->get();
        $data = Employee::find($uid);
        if(!$request->all())
            return view('firefighters.ajax-edit-pegawai', compact('data', 'employee'));
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->phone = $request->phone;
        $data->position_id = $request->position_id;
        if($data->save())
            return redirect(url('firefighters/'.$data['rest_id'].'/firefighters-detail'))->with('success', 'Employee is Edited !');
        return redirect(url('firefighters/'.$data['rest_id'].'/firefighters-detail'))->with('failed', 'Employee is failed to be edited, contact developer !');
    }
    

}