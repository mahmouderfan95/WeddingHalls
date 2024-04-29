<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use WeddingHallsServices;

class WeddingHallsController extends Controller
{
    public function __construct(public WeddingHallsServices $weddingHallsServices){}
}
