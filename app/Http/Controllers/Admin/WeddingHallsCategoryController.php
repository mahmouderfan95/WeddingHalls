<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use WeddingHallsCategoryServices;

class WeddingHallsCategoryController extends Controller
{
    public function __construct(public WeddingHallsCategoryServices $weddingHallsCategoryServices){}
}
