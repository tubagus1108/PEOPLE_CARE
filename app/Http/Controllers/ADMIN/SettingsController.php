<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Settings;
use App\Models\Admin\Hospital;
use App\Models\Admin\Firefighters;
use Datatables;
use Carbon\Carbon;

class SettingsController extends Controller
{
    public function employee(Request $request){
        $hospital = Hospital::where('deleted_at',null)->get();
        $employee = Settings::where('deleted_at',null)->get();
        if(!$request->all())
            return view('settings.employee', compact('employee', 'hospital'));
        else{
            $insert = $request->validate([
                'name' => 'required|unique:employee_position,name|max:30|min:2,'
            ]);
            $insert = Settings::create($request->all());
            if($insert)
                return redirect(route('employee'))->with('success', 'Success stored new Employee data');
            return redirect(route('employee'))->with('failed', 'failed stored new Employee data');
        }
        
    }
    public function employeeDatatable(){
        $data = Settings::where('deleted_at',null)->get();

        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            $delete_link = "'".url('settings/employee-delete/'.$data['id'])."'";
            $delete_message = "'This cannot be undo'";
            $edit_link = "'".url('settings/'.$data['id'].'/employee-edit')."'";

            $edit = '<button  key="'.$data['id'].'"  class="btn btn-info text-white" data-toggle="modal" data-target="#editEmployee" onclick="editEmployee('.$edit_link.')"> <i class="fa fa-edit"> </i> </button>';
            $delete = '<button onclick="confirm_me('.$delete_message.','.$delete_link.')" class="btn btn-danger text-white"> <i class="fa fa-trash"> </i> </button>';
            return $edit.' '.$delete;
        })
        ->addColumn('created_at', function($data){
            return Carbon::parse($data['created_at'])->format('F d, y');
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function employeeDelete($id){
        $data = Settings::find($id);
        if($data->delete())
            return redirect(url('settings/employee'))->with('success','Success delete Employee');
        return redirect(url('settings/employee'))->with('failed','Failed delete Employee');
    }
    public function employeeEdit($id){
        $data = Settings::find($id);
        return view('settings/ajax-employee-edit', compact('data'));
    }
    public function employeeEditExecute(Request $request){
        $data = $request->validate([
            'name' => 'required|max:30|min:2,'
        ]);
        $data = Settings::find($request->id);
        $data->name = $request->name;
        if($data->save())
            return redirect(url('settings/employee'))->with('success','successfully changed data employee ' .$data['name']);
        return redirect(url('settings/'.$request->id.'/employee-edit'))->with('failed','failed to change data employee' .$data['name']);
    }
}
