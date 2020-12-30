<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\PeopleReports;
use App\Models\Admin\PeopleMembers;
use App\Models\Admin\City;
use App\Models\Admin\Province;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use PhpParser\Node\Stmt\ElseIf_;

class ReportsController extends Controller
{
    public function peoplereports(){
        return view('reports.people-reports');
    }
    public function reportsdatatable(){
        $data = PeopleReports::where('deleted_at',null);

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('created_at', function($data){
            return Carbon::parse($data['created_at'])->format('F d, y');
        })
        ->make(true);
        
    }
    public function peoplemembers(){
        return view ('reports.people-members');
    }
    public function membersdatatable(){
        $data = PeopleMembers::where('deleted_at',null);

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            $detail_link = "'".url('reports/'.$data['uid'].'/details-members')."'";
            $delete_link = "'".url('reports/'.$data['uid'].'/members-delete')."'";
            $delete_message = "'This cannot be undo'";
            $detail = '<button onclick ="document.location.href='.$detail_link.'" class="btn btn-primary p-2" > <i class="fa fa-eye"> </i> </button>';
            $delete = '<button onclick="confirm_me('.$delete_message.','.$delete_link.')" class="btn btn-danger text-white"> <i class="fa fa-trash"> </i> </button>';
            return $detail.' '.$delete;
        })
        ->addColumn('status', function($data){
            if($data['accepted'] != null)        
                return view ('reports.accepted');
            else{
                $data['pending'] != null;
                return view ('reports.pending');
            }
        })
        ->addColumn('created_at', function($data){
            return Carbon::parse($data['created_at'])->format('F d, y');
        })
        ->rawColumns(['action'])
        ->make(true);
        
    }
    public function detailsmembers($uid){
        $data = PeopleMembers::find($uid);
        $members = PeopleMembers::all();
        $city = City::all();
        $province = Province::all();
        return view('reports.details-members', compact('data','city','province','members'));
    }
    public function membersDelete($uid){
        $data = PeopleMembers::find($uid);
        if($data->delete())
        return redirect(url('reports/people-members'))->with('success','Success delete Members');
    return redirect(url('reports/people-members'))->with('failed','Failed delete Members');
    }
    public function accepted(Request $request){
        $data = PeopleMembers::find($request->uid);
        $data->accepted = Carbon::now('Asia/Jakarta');
        if($data->save())
            return redirect(url('reports/people-members'))->with('success','successfully changed data members ' .$data['accepted']);
        
    }
    public function pending(Request $request){
        $data = PeopleMembers::find($request->uid);
        $data->pending = Carbon::now('Asia/Jakarta');
        $data->rejection_reason = $request->rejection_reason;
        if($data->save())
            return redirect(url('reports/people-members'))->with('success','successfully changed data members ' .$data['pending']);
        
    }
}
