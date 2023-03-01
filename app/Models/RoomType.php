<?php

namespace App\Models;

use App\Models\Rooms;
use App\Models\Booking;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rooms(): HasMany
    {
        return $this->hasMany(Rooms::class);
    }


    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}

