<?php

namespace App\Models;

use App\Models\Rooms;
use App\Models\RoomType;
use App\Models\IDCardType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];


    public function card_type(): BelongsTo
    {
        return $this->belongsTo(IDCardType::class);
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Rooms::class);
    }

    public function room_type(): HasMany
    {
        return $this->hasMany(RoomType::class);
    }
}
