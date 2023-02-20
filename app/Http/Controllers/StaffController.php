<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    //show
    public function show(){
        return view('admin.staff.staff');
    }
}
