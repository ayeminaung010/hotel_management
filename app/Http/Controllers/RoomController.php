<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomType;
use App\Models\IDCardType;
use Illuminate\Http\Request;
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
        // dd($request->all());
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
        dd($id);
    }

    //delete
    public function delete($id){
        $result = Rooms::where('id',$id)->delete();
        return back()->with([['success' => 'delete Successfully']]);
    }
}
