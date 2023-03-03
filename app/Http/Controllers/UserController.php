<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\RoomType;
use App\Mail\BookingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Storage;
use App\Notifications\BookingRealTimeNoti;
use Illuminate\Support\Facades\Notification;

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
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        $user = User::where('role','admin')->first();
        Notification::send($user, new BookingRealTimeNoti($contact));
        
        return back()->with(['success' => 'Your Message Well Received!..Please wait Our Reply In your Mail Box : >']);
    }

    //updateProfile
    public function updateProfile(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'avatar' => 'mimes:png,jpg,jpeg,webp'
        ]);
        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        if( $request->avatar){
            $oldImage = $user->avatar;
            if($oldImage !== null){
                Storage::delete('public/img/profile/'.$user->avatar);
            }

            $imageName = uniqid().'_'. $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storeAs('public/img/profile/',$imageName);
            $user->avatar = $imageName;
        }
        $user->save();
        return back()->with(['success' => 'Profile Updated']);
    }

    //passwordChange
    public function passwordChange(Request $request,$id){
        $request->validate([
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
        $user = User::where('id',$id)->first();
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            return redirect()->back()->with('success', 'Password changed successfully');
        } else {
            return redirect()->back()->with('error', 'Current password does not match');
        }
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
