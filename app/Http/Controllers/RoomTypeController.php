<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Requests\RoomTypeRequest;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    //index
    public function index(){

        $roomTypes = RoomType::get();
        return view('admin.room-type.list',compact('roomTypes'));
    }

    //store
    public function store(RoomTypeRequest $request){
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

    //delete
    public function delete($id){
        // dd($id);
        $roomType = RoomType::where('id',$id)->first();
        $roomType->delete();
        return back()->with(['success' => 'Room Type deleted..']);
    }

    ///update
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|max:60|unique:room_types,name,'.$id .',id',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'price' => 'required',
            'description' => 'required',
        ]);
        $roomType = RoomType::where('id',$id)->first();
        $oldImage = $roomType->image;
        $roomType->name = $request->name;
        $roomType->price_per_night = $request->price;
        $roomType->description = $request->description;
        if($request->hasFile('image')){
            if($oldImage !== null){
                Storage::delete('public/img/roomTypes/'.$oldImage);
            }
            $imageName = uniqid() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/img/roomTypes/',$imageName);
            $roomType->image =$imageName;
        }
        $roomType->update();
        return back()->with(['success' => 'Room Type Created..']);
    }

}
