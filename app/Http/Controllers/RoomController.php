<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    //show
    public function show(){
        return view('admin.manage.rooms');
    }
}
