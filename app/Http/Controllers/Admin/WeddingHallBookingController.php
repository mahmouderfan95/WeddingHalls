<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\WeddingHallBookingServices;
use Illuminate\Http\Request;

class WeddingHallBookingController extends Controller
{
    public function __construct(public WeddingHallBookingServices $weddingHallBookingServices){}
    public function index()
    {
        return $this->weddingHallBookingServices->index();
    }
    public function destroy($id)
    {
        return $this->weddingHallBookingServices->destroy($id);
    }
}
