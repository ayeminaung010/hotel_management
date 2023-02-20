<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //show
    public function show(){
        return view('admin.reservation.reservation');
    }
}
