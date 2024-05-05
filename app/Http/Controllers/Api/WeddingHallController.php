<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\API\WeddingHallServies;
use Illuminate\Http\Request;

class WeddingHallController extends Controller
{
    public function __construct(public WeddingHallServies $weddingHallServies){}
    public function index()
    {
        return $this->weddingHallServies->index();
    }
    public function show($id)
    {
        return $this->weddingHallServies->show($id);
    }
    public function getWeddingByCategory($id)
    {
        return $this->weddingHallServies->getWeddingByCategory($id);
    }
}
