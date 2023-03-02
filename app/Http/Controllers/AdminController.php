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
        $pendingPayments = Reservation::where('remaining_bill', '!=' , 0)->get();

        $userBills = Reservation::pluck('user_bill')->toArray();
        $pendingBills = Reservation::pluck('remaining_bill')->toArray();

        $totalEarning = 0;
        foreach($userBills as $bill){
            $totalEarning += $bill;
        };
        $totalPending = 0;
        foreach($pendingBills as $pendingBill){
            $totalPending += $pendingBill;
        };
        return view('admin.home.dashboard',compact('rooms','reservations','staffs','bookRooms','availableRooms','checkIn','pendingPayments','totalEarning','totalPending'));
    }
}
