<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    // list
    public function list(){
        return view('admin.Online-Booking.list');
    }
}
