<?php

namespace App\Models;

use App\Models\Position;
use App\Models\WorkingTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function workingTime(): BelongsTo
    {
        return $this->belongsTo(WorkingTime::class);
    }
}
