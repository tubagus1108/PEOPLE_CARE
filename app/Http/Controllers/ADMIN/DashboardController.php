<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Admin\PeopleMembers;
use App\Models\Admin\PeopleReports;

class DashboardController extends Controller
{
    public function dashboard(){
        $jumlah_report = PeopleReports::all();
        $self_report = PeopleReports::all()->count();
        $other_report = PeopleReports::all()->count();
        $panic_button = PeopleReports::all()->count();
        $jumlah_members = PeopleMembers::all()->count();
    
        // Data Chart Complaint
        

        return view('dashboard.dashboard',compact('jumlah_members','self_report','other_report','panic_button'));
    }


}
