<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeddingHallBooking extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function weddingHall() : BelongsTo
    {
        return $this->belongsTo(WeddingHall::class,'wedding_hall_id');
    }
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
