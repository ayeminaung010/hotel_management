<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard');
        }else{
            return back()->with(['notFound' => 'User not found']);
        }
    }

    //register
    public function register(UserRequest $request){
        $user  = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->save();
        return back()->with(['success' => 'Register success! Please Sign In']);
    }

    //logout
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}