<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //show
    public function show(){
        $staffs = Staff::get();
        return view('admin.staff.staff',compact('staffs'));
    }
}
