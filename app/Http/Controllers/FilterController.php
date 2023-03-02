<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomType;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    //booking
    public function booking(Request $request){
        $rooms = Rooms::where('booking_status',$request->bookingStatus)->with('roomType')->get();
        return response()->json($rooms,200);
    }

    //roomType
    public function roomType(Request $request){
        logger($request->roomTypeStatus);
        $rooms = Rooms::where('room_type_id',$request->roomTypeStatus)->with('roomType')->get();
        return response()->json($rooms,200);
    }

    //roomTypeDate
    public function roomTypeDate(Request $request){
            logger($request->roomTypeDate);
            $roomTypes = RoomType::orderBy('created_at',$request->roomTypeDate)->get();
            return response()->json($roomTypes,200);
    }
}
