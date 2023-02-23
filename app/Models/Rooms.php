<?php

namespace App\Models;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rooms extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }
}
