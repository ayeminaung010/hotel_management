<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\OtpMail;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    //dashboard
    public function dashboard(){
        if(auth()->check()){
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }
            if(Auth::user()->role == 'user'){
                return redirect()->route('user.home');
            }
        }
    }

    //login
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ]);
        $user = User::where('email',$request->email)->first();
        if($user !== null){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('dashboard');
            }else{
                return back()->with(['error' => 'Password does not match']);
            }
        }else{
            return back()->with(['notFound' => 'User does not found']);
        }

    }

    //register
    public function register(UserRequest $request){
        $registerUser = User::where('email',$request->email)->first();
        if($registerUser === null){
            $user  = new User();
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->gender = $request->gender;
            $user->save();
            return back()->with(['success' => 'Register success! Please Sign In']);
        }else{
            return back()->with(['error' => 'Email Already Taken!']);
        }
    }

    //logout
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    //forgotPassword
    public function forgotPassword(){
        return view('app.forget-password');
    }

    //OTPRequest
    public function OTPRequest(Request $request){
        $request->validate([
            'email' => 'required',
        ]);
        $otp = mt_rand(100000, 999999);
        $user = User::where('email',$request->email)->first();
        if($user){
            $request->session()->put('otp_code', $otp);
            $request->session()->put('email', $request->email);
            Mail::to($user)->send(new OtpMail($otp));
            Toastr::success('OTP sent Successfully', 'OTP');
            return view('app.verify-OTP');
        }else{
            Toastr::error('This Email does not found..', 'Not Found');
            return view('app.forget-password');
        }
    }

    //OTPverify
    public function OTPverify(Request $request){
        $request->validate([
            'OTP' => 'required',
        ]);
        $otp_code = $request->session()->get('otp_code');
        if($request->OTP == $otp_code){
            return view('app.password-change');
        }else{
            Toastr::error('OTP does not match', 'Error OTP');
            return view('app.verify-OTP');
        }
    }

    //OTPSendAgain
    public function OTPSendAgain(Request $request){
        $email = $request->session()->get('email');
        $otp = mt_rand(100000, 999999);
        if($email){
            $request->session()->put('otp_code', $otp);
            Mail::to($email)->send(new OtpMail($otp));
            Toastr::success('OTP sent Successfully', 'OTP');
            return view('app.verify-OTP');
        }
    }

    //changePassword
    public function changePassword(Request $request){
        $request->validate([
            'new_password' => 'required|min:6',
            'confirm_password' => 'required',
        ]);
        if($request->new_password === $request->confirm_password){
            $email = $request->session()->get('email');
            $user = User::where('email',$email)->first();
            $user->password = Hash::make($request->new_password);
            $user->update();
            return redirect('/login');
        }else{
            Toastr::error('confirm password must be same with new password', 'Error');
            return view('app.password-change');
        }

    }
}
