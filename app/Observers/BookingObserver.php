<?php

namespace App\Observers;

use App\Models\WeddingHallBooking;

class BookingObserver
{
    public function creating(WeddingHallBooking $weddingHallBooking)
    {
        $weddingHallBooking->profit = $weddingHallBooking->CalcProfit();
    }
}
