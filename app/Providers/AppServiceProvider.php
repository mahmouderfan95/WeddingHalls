<?php

namespace App\Providers;

use App\Models\WeddingHallBooking;
use App\Observers\BookingObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        WeddingHallBooking::observe(BookingObserver::class);
    }
}
