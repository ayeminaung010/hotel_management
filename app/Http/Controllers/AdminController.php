<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rooms;
use App\Models\Staff;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //dashboard
    public function dashboard(){
        $rooms = Rooms::get();
        $reservations = Reservation::get();
        $staffs = Staff::get();
        $bookRooms = Rooms::where('booking_status','1')->get();
        $availableRooms = Rooms::where('booking_status','0')->get();
        $checkIn = Reservation::where('user_bill','!==', null)->where('remaining_bill','!==',null)->get();
        $pendingPayments = Reservation::where('remaining_bill', '!=' , 0)->get();

        $userBills = Reservation::withTrashed()->pluck('user_bill')->toArray();
        $pendingBills = Reservation::pluck('remaining_bill')->toArray();

        $totalEarning = 0;
        foreach($userBills as $bill){
            $totalEarning += $bill;
        };

        $totalPending = 0;
        foreach($pendingBills as $pendingBill){
            $totalPending += $pendingBill;
        };
        return view('admin.home.dashboard',compact('rooms','reservations','staffs','bookRooms','availableRooms','checkIn','pendingPayments','totalEarning','totalPending'));
    }

    //updateProfile
    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'avatar' => 'mimes:png,jpg,jpeg,webp'
        ]);
        $user = User::where('id',Auth::user()->id)->where('role','admin')->first();
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
    public function passwordChange(Request $request){
        $request->validate([
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
        $user = User::where('id',Auth::user()->id)->where('role','admin')->first();

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            return redirect()->back()->with('success', 'Password changed successfully');

        } else {
            return redirect()->back()->with('error', 'Current password does not match');
        }
    }
}
