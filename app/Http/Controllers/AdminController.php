<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //dashboard
    public function dashboard(){
        return view('admin.home.dashboard');
    }
}
