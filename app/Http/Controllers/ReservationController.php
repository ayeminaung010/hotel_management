<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomType;
use App\Models\IDCardType;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReservationRequest;

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
        $price_room_type = RoomType::where('id',$request->room_type)->pluck('price_per_night');
        return response()->json([$rooms,$price_room_type],200);
    }

    //create
    public function create(ReservationRequest $request){

        try {
            DB::beginTransaction();
            $reservation = new Reservation();
            $reservation->room_type_id = json_encode($request->room_type);
            $reservation->room_id = json_encode($request->room_no);
            $reservation->check_in = $request->check_in;
            $reservation->check_out = $request->check_out;
            $reservation->first_name = $request->first_name;
            $reservation->phone_no = $request->phone_no;
            $reservation->email = $request->email;
            $reservation->card_type_id = $request->card_type;
            $reservation->card_number = $request->card_no;
            $reservation->residential_address = $request->address;
            $reservation->number_of_guest = $request->guest_no;

            if($request->last_name){
                $reservation->last_name = $request->last_name;
            }
            if($request->child_no){
                $reservation->number_of_child = $request->child_no;
            }

            $room_types_arr = $request->room_type;
            $room_no_arr = $request->room_no;

            foreach($room_no_arr as $room_no){
                $room = Rooms::find($room_no);
                $room->booking_status = '1';
                $room->update();
            }

            $total_price = 0;
            foreach($room_types_arr as $room_types){
                $room = RoomType::find($room_types);
                $total_price += $room->price_per_night;
            }
            $reservation->total_cost = $total_price * $request->totalDay;
            $reservation->save();
            DB::commit();
            return back()->with(['success' => 'Reservation Successs!.... Total Cost is '.$reservation->total_cost . ' $']);
        } catch (Exception $e) {
            DB::rollback();
            return back()->with(['error' => 'Reservation Failed!....']);
        }
    }

    //index
    public function index(){
        $reservations = Reservation::get();
        return view('admin.reservation.list',compact('reservations'));
    }
}
