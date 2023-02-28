<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Requests\RoomTypeRequest;

class RoomTypeController extends Controller
{
    //index
    public function index(){

        $roomTypes = RoomType::get();
        return view('admin.room-type.list',compact('roomTypes'));
    }

    //store
    public function store(RoomTypeRequest $request){
        // dd($request->all());
        $roomType = new RoomType();
        $roomType->name = $request->name;
        $roomType->price_per_night = $request->price;
        $roomType->description = $request->description;
        if($request->hasFile('image')){
            $imageName = uniqid() . '_' . $request->file('image')->getClientOriginalName();

            $request->file('image')->storeAs('public/img/roomTypes/',$imageName);
            $roomType->image =$imageName;
        }
        $result = $roomType->save();
        return back()->with(['success' => 'Room Type Created..']);
    }
}
