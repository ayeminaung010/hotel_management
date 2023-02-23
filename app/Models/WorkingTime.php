<?php

namespace App\Models;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkingTime extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function staffs(): HasMany
    {
        return $this->hasMany(Staff::class);
    }
}
