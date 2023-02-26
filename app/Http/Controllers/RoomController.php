<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomType;
use App\Models\IDCardType;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomController extends Controller
{
    //show
    public function show(){
        $rooms  = Rooms::all();
        $roomType  = RoomType::all();
        $card_types = IDCardType::get();
        // foreach($rooms as $r){
        //     if($r->reservation_id !== null){
        //         dd($r->reservation->total_cost);
        //     }
        // }
        return view('admin.manage.rooms',compact('rooms','roomType','card_types'));
    }

    //add
    public function add(Request $request){
        $request->validate([
            'room_no' => 'required',
            'room_type' => 'required',
        ]);
        $room = new Rooms();
        $room->room_no = $request->room_no;
        $room->room_type_id = $request->room_type;
        $room->save();
        return back()->with(['success' => 'room created success!']);
    }

    //update
    public function update(Request $request,$id){
        $room = Rooms::where('id',$id)->first();
        $room->room_no = $request->room_no;
        $room->room_type_id = $request->room_type;
        $room->save();
        return back()->with(['success' => 'room details updated success']);
    }

    //delete
    public function delete($id){
        $result = Rooms::where('id',$id)->delete();
        return back()->with([['success' => 'delete Successfully']]);
    }

    //checkIn
    public function checkIn(Request $request){
        $room = Rooms::where('id',$request->data['room_id'])->first();

        $room->reservation->user_bill = $room->reservation->user_bill +  $request->data['user_payment'];
        $room->reservation->remaining_bill = $room->reservation->total_cost - $request->data['user_payment'];
        $room->reservation->update();
        return response()->json(['success' => 'successfully check-in']);
    }

    //checkout
    public function checkOut(Request $request){
        try {
            DB::beginTransaction();
            $room = Rooms::where('id',$request->data['room_id'])->first();

            $room->reservation->user_bill =  $room->reservation->user_bill + $request->data['user_payment'];
            $room->reservation->remaining_bill = $room->reservation->remaining_bill - $request->data['user_payment'];
            $room->reservation->update();

            if($room->reservation->remaining_bill === 0){
                $reservation = Reservation::find($room->reservation_id);
                logger($room->reservation_id);
                $reservation->delete();

                $room->booking_status = '0';
                $room->reservation_id = null;
                $room->reservation->update();
                $room->update();
            }
            DB::commit();
            return response()->json(['success' => 'successfully checkout']);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['fail' => 'Failed checkout']);
        }
    }
}
