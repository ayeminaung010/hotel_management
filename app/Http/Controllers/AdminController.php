<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\Staff;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //dashboard
    public function dashboard(){
        $rooms = Rooms::get();
        $reservations = Reservation::get();
        $staffs = Staff::get();
        $bookRooms = Rooms::where('booking_status','1')->get();
        $availableRooms = Rooms::where('booking_status','0')->get();
        $checkIn = Reservation::where('user_bill','!==', null)->where('remaining_bill','!==',null)->get();
        $pendingPayments = Reservation::where('remaining_bill','!==',null)->where('remaining_bill','!==',0)->get();
        $totalEarning = Reservation::pluck('user_bill');
        $totalPending = Reservation::pluck('remaining_bill');
        // dd($totalPending);
        return view('admin.home.dashboard',compact('rooms','reservations','staffs','bookRooms','availableRooms','checkIn','pendingPayments','totalEarning','totalPending'));
    }
}
