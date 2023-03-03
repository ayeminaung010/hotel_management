<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\Staff;
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
        $rooms = Rooms::where('room_type_id',$request->roomTypeStatus)->with('roomType')->get();
        return response()->json($rooms,200);
    }

    //roomTypeDate
    public function roomTypeDate(Request $request){
            $roomTypes = RoomType::orderBy('created_at',$request->roomTypeDate)->get();
            return response()->json($roomTypes,200);
    }

    //workTimeSort
    public function workTimeSort(Request $request){
        $staffs = Staff::where('working_time_id',$request->workTimeSort)->with('workingTime')->with('position')->get();
        return response()->json($staffs,200);
    }


    //searchStaff
    public function searchStaff(Request $request){
        $staffs = Staff::where('name','like','%'.$request->searchData.'%')
                ->orWhere('salary','like','%'.$request->searchData.'%')
                ->orWhereHas('position', function ($query) use ($request) {
                    $query->where('name', 'like', '%'.$request->searchData.'%');
                })
                ->with('workingTime')->with('position')->get();
        return response()->json($staffs,200);
    }


    //searchRoomType
    public function searchRoomType(Request $request){
        $roomTypes = RoomType::where('name','like','%'.$request->search.'%')
                    ->orWhere('price_per_night','like','%'.$request->search.'%')
                    ->orWhere('description','like','%'.$request->search.'%')
                    ->get();
        return response()->json($roomTypes,200);
    }

    //searchRoomNo
    public function searchRoomNo(Request $request){
        $rooms = Rooms::where('room_no','like','%'.$request->search.'%')
                        ->with('roomType')->get();
        return response()->json($rooms,200);
    }
}
