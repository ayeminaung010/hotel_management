<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Position;
use App\Models\WorkingTime;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //show
    public function show(){
        $staffs = Staff::get();
        $positions  = Position::get();
        $workTimes  = WorkingTime::get();
        return view('admin.staff.staff',compact('staffs','positions','workTimes'));
    }
}
