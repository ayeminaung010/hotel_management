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

Route::prefix('admin')->middleware('admin_middleware')->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

    // reservation
    Route::prefix('reservation')->group(function () {
        Route::get('/',[ReservationController::class,'show'])->name('admin.reservation');
        Route::post('/create',[ReservationController::class,'create'])->name('reservation.create');
        Route::get('/list',[ReservationController::class,'index'])->name('reservation.index');
    });


    // axios
    Route::get('/room_number/get',[ReservationController::class,'getNumber'])->name('room_no');

    //rooms
    Route::get('/rooms-manage',[RoomController::class,'show'])->name('admin.rooms');

    //employee manage
    Route::prefix('staff-manage')->group(function () {
        Route::get('/',[StaffController::class,'show'])->name('admin.staff');
        Route::post('/change/work-time/{id}',[StaffController::class,'change'])->name('change.workTime');
        Route::post('/delete/{id}',[StaffController::class,'delete'])->name('delete.staff');
        Route::post('/add/employee',[StaffController::class,'add'])->name('add.staff');
    });

});
