<?php

use App\Http\Controllers\RecycleBin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoomTypeController;
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
    Route::post('/online-booking',[UserController::class,'booking'])->name('user.booking');

    Route::get('/about',[UserController::class,'about'])->name('user.about');

    Route::get('/service',[UserController::class,'service'])->name('user.service');

    Route::get('/pages/rooms',[UserController::class,'rooms'])->name('user.rooms');
    Route::get('/rooms/detail/{id}',[UserController::class,'detail'])->name('detail.rooms');
    Route::post('/booking-room',[UserController::class,'detailBooking'])->name('booking.detail.rooms');

    Route::prefix('contact')->group(function () {
        Route::get('/',[UserController::class,'contact'])->name('user.contact');
        Route::post('/send',[UserController::class,'send'])->name("contact.send");
    });

    Route::prefix('profile')->group(function () {
        Route::post('/update/{id}',[UserController::class,'updateProfile'])->name('UserProfile.update');
        Route::post('/passwordChange/{id}',[UserController::class,'passwordChange'])->name('UserProfile.passwordChange');
    });


});

Route::prefix('admin')->middleware('admin_middleware')->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

    // reservation
    Route::prefix('reservation')->group(function () {
        Route::get('/',[ReservationController::class,'show'])->name('admin.reservation');
        Route::post('/create',[ReservationController::class,'create'])->name('reservation.create');
        Route::get('/list',[ReservationController::class,'index'])->name('reservation.index');
        Route::get('/delete/{id}',[ReservationController::class,'delete'])->name('reservation.delete');
        Route::get('/edit/{id}',[ReservationController::class,'edit'])->name('reservation.edit');
        Route::post('/update/{id}',[ReservationController::class,'update'])->name('reservation.update');
    });

    // axios
    Route::get('/room_number/get',[ReservationController::class,'getNumber'])->name('room_no');

    //rooms
    Route::prefix('rooms-manage')->group(function () {
        Route::get('/',[RoomController::class,'show'])->name('admin.rooms');
        Route::post('/add',[RoomController::class,'add'])->name('add.rooms');
        Route::post('/update/{id}',[RoomController::class,'update'])->name('update.room');
        Route::post('/delete/{id}',[RoomController::class,'delete'])->name('delete.room');
        Route::post('/check-in',[RoomController::class,'checkIn'])->name('checkIn.room');
        Route::post('/check-out',[RoomController::class,'checkout'])->name('checkout.room');
    });

    //employee manage
    Route::prefix('staff-manage')->group(function () {
        Route::get('/',[StaffController::class,'show'])->name('admin.staff');
        Route::post('/change/work-time/{id}',[StaffController::class,'change'])->name('change.workTime');
        Route::post('/delete/{id}',[StaffController::class,'delete'])->name('delete.staff');
        Route::post('/add/employee',[StaffController::class,'add'])->name('add.staff');
        Route::post('/update/employee/{id}',[StaffController::class,'update'])->name('update.staff');
    });

    Route::prefix('recycle')->group(function () {
        Route::get('/lists',[RecycleBin::class,'list'])->name('admin.recycle');
        Route::get('/delete/{id}',[RecycleBin::class,'delete'])->name('delete.recycle');
        Route::get('/restore/{id}',[RecycleBin::class,'restore'])->name('restore.recycle');
    });

    Route::prefix('online-booking')->group(function () {
        Route::get('/',[BookingController::class,'list'])->name('online.booking');
        Route::get('/delete/{id}',[BookingController::class,'delete'])->name('delete.booking');
    });


    Route::prefix('room-type')->group(function () {
        Route::get('/',[RoomTypeController::class,'index'])->name("index.roomType");
        Route::post('/create',[RoomTypeController::class,'store'])->name("store.roomType");
        Route::get('/delete/{id}',[RoomTypeController::class,'delete'])->name("delete.roomType");
        Route::post('/update/{id}',[RoomTypeController::class,'update'])->name("update.roomType");
    });

    Route::prefix('contact')->group(function () {
        Route::get('/',[ContactController::class,'show'])->name('show.contact');
        Route::get('/delete/{id}',[ContactController::class,'delete'])->name('delete.contact');
        Route::post('/reply/{id}',[ContactController::class,'reply'])->name('reply.contactMessage');
    });

    Route::prefix('profile')->group(function () {
        Route::post('/update',[AdminController::class,'updateProfile'])->name('profile.update');
        Route::post('/passwordChange',[AdminController::class,'passwordChange'])->name('profile.passwordChange');
    });

    //ajax
    Route::get('/filter-booking',[FilterController::class,'booking'])->name('booking-filter');
    Route::get('/filter-roomType',[FilterController::class,'roomType'])->name('roomType-filter');
    Route::get('/filter-roomTypeDate',[FilterController::class,'roomTypeDate'])->name('roomTypeDate-filter');
    Route::get('/filter-workTimeSort',[FilterController::class,'workTimeSort'])->name('workTimeSort-filter');
    Route::get('/filter-reservationSort',[FilterController::class,'reservationSort'])->name('reservationSort-filter');
    Route::get('/search-staff',[FilterController::class,'searchStaff'])->name('searchStaff');
    Route::get('/search-room-type',[FilterController::class,'searchRoomType'])->name('searchRoomType');
    Route::get('/search-room-no',[FilterController::class,'searchRoomNo'])->name('searchRoomNo');
    Route::get('/search-reservation',[FilterController::class,'searchReservation'])->name('searchReservation');

    //noti setting on/off
    Route::get('/notification',[AdminController::class,'notification'])->name('notification');
});
