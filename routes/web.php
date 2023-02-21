<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ReservationController;


Route::get('/', function () {
    return redirect('user/home');
});

Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');

Route::view('/login', 'app.login');
Route::view('/register', 'app.register');

Route::post('/auth/login',[AuthController::class,'login'])->name('login.user');
Route::post('/auth/register',[AuthController::class,'register'])->name('register.user');
Route::post('/auth/logout',[AuthController::class,'logout'])->name('logout.user')->middleware('auth');

Route::prefix('user')->group(function () {
    Route::get('/home',[UserController::class,'home'])->name('user.home');
});

Route::prefix('admin')->middleware('admin_middleweare')->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

    // reservation
    Route::get('/reservation',[ReservationController::class,'show'])->name('admin.reservation');

    // axios
    Route::get('/room_number/get',[ReservationController::class,'getNumber'])->name('room_no');

    //rooms
    Route::get('/rooms-manage',[RoomController::class,'show'])->name('admin.rooms');

    //employee manage
    Route::get('/staff-manage',[StaffController::class,'show'])->name('admin.staff');
});
