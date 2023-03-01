<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // list
    public function list(){
        $bookings = Booking::get();
        return view('admin.Online-Booking.list',compact('bookings'));
    }

    //delete.booking
    public function delete($id){
        // dd($id);
        $booking = Booking::where('id',$id)->delete();
        return back()->with(['success' => 'Booking Deleted...']);
    }
}
