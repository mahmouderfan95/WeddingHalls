<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\API\WeddingHallCategoryServices;
use Illuminate\Http\Request;

class WeddingHallCategoryController extends Controller
{
    public function __construct(public WeddingHallCategoryServices $weddingHallCategoryServices){}
    public function index()
    {
        return $this->weddingHallCategoryServices->index();
    }
}
