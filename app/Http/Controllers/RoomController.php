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
}
