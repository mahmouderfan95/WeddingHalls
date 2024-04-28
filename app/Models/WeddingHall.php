<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeddingHall extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function weddingHallCategory() : BelongsTo
    {
        return $this->belongsTo(WeddingHallCategory::class,'wedding_hall_category_id');
    }
}
