<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\RoomType;
use App\Mail\BookingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

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
        return back()->with(['success' => 'Booking Success!  Please check your gmail box... ']);
    }

    //detail
    public function detail($id){
        $roomType = RoomType::where('id',$id)->first();
        return view('user.pages.room-detail',compact('roomType'));
    }

    //booking
    public function detailBooking(Request $request){
        $this->book($request);
        return back()->with(['success' => 'Booking Success! Please check your gmail box... ']);
    }

    //send
    public function send(ContactRequest $request){
        // dd($request->all());
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return back()->with(['success' => 'Your Message Well Received!..Please wait Our Reply In your Mail Box : >']);
    }


    //private booking function
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
        Mail::to($request->user())->send(new BookingMail($booking));
        $booking->save();
    }
}
