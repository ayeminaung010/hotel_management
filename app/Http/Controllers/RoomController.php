<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomController extends Controller
{
    //show
    public function show(){
        $rooms  = Rooms::all();
        $roomType  = RoomType::all();

        return view('admin.manage.rooms',compact('rooms','roomType'));
    }
}
