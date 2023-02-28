<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //home
    public function home(){
        $roomTypes = RoomType::paginate('6');
        return view('user.home.home',compact('roomTypes'));
    }

    //about
    public function about(){
        return view('user.about');
    }

    //service
    public function service(){
        return view('user.service');
    }

    //blogs
    public function blogs(){
        return view('user.blog.blog');
    }

    //singleBlog
    public function singleBlog(){
        return view('user.blog.single-blog');
    }

    //rooms
    public function rooms(){
        $roomTypes = RoomType::get();
        return view('user.pages.rooms',compact('roomTypes'));
    }

    //contact
    public function contact(){
        return view('user.contact');
    }

    //booking
    public function booking(Request $request){
        $this->book($request);
        return back()->with(['success' => 'Booking Success!']);
    }

    //detail
    public function detail($id){
        $roomType = RoomType::where('id',$id)->first();
        return view('user.pages.room-detail',compact('roomType'));
    }

    //booking
    public function detailBooking(Request $request){
        $this->book($request);
        return back()->with(['success' => 'Booking Success!']);
    }

    private function book($request){
        $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
            'adult_people' => 'required',
            'child_people' => 'required',
            'room_amount' => 'required',
        ]);
        $booking = new Booking();
        $booking->check_in = $request->check_in;
        $booking->check_out = $request->check_out;
        $booking->user_id = $request->user_id;
        $booking->number_of_guest = $request->adult_people;
        $booking->number_of_child = $request->child_people;
        if($request->room_id){
            $booking->room_type_id = $request->room_id;
        }
        $booking->save();
    }
}
