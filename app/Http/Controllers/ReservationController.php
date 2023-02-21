<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomType;
use App\Models\IDCardType;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //show
    public function show(){
        $room_types = RoomType::get();
        $card_types = IDCardType::get();
        return view('admin.reservation.reservation',compact('room_types','card_types'));
    }


    //getNumber
    public function getNumber(Request $request){
        $rooms = Rooms::where('room_type_id',$request->room_type)->where('booking_status','0')->get();
        return response()->json($rooms,200);
    }
}
