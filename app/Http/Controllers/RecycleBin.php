<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomType;
use App\Models\Reservation;
use Illuminate\Http\Request;

class RecycleBin extends Controller
{
    //list
    public function list(){
        $reservations = Reservation::onlyTrashed()->get();
        $reservationRoomTypes = [];
        $reservationRoomNos = [];

        foreach ($reservations as $reservation) {
            $roomTypeIds = json_decode($reservation->room_type_id);
            $roomIds = json_decode($reservation->room_id);
            $roomTypes = [];
            $roomId_arr = [];

            foreach ($roomTypeIds as $roomTypeId) {
                $roomType = RoomType::find($roomTypeId);
                if ($roomType) {
                    $roomTypes[] = $roomType;
                }
            }

            foreach ($roomIds as $roomId) {
                $room_id = Rooms::find($roomId);
                if ($room_id) {
                    $roomId_arr[] = $room_id;
                }
            }

            $reservationRoomTypes[$reservation->id] = $roomTypes;
            $reservationRoomNos[$reservation->id] = $roomId_arr;
        }
        return view('admin.recycle.list',compact('reservations','reservationRoomTypes','reservationRoomNos'));
    }

    ///delete
    public function delete($id){
        $reservation = Reservation::where('id',$id)->withTrashed()->first();
        $reservation->forceDelete();
        return back()->with(['success' => 'Permanently Deleted...']);
    }

    //restore
    public function restore($id){
        $reservation = Reservation::where('id',$id)->withTrashed()->first();
        $reservation->restore();
        return back()->with(['success' => 'Successfully Restored data...']);
    }
}
