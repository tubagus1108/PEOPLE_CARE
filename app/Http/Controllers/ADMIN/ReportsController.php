<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\PeopleReports;
use App\Models\Admin\PeopleMembers;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;

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
        ->addColumn('created_at', function($data){
            return Carbon::parse($data['created_at'])->format('F d, y');
        })
        ->make(true);
        
    }
}
