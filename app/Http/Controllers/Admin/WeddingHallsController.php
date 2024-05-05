<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WeddingHall\Store;
use App\Services\Admin\WeddingHallsServices;
use Illuminate\Http\Request;

class WeddingHallsController extends Controller
{
    public function __construct(public WeddingHallsServices $weddingHallsServices){}
    public function index()
    {
        return $this->weddingHallsServices->index();
    }
    public function create()
    {
        return $this->weddingHallsServices->create();
    }
    public function store(Store $request)
    {
        return $this->weddingHallsServices->store($request);
    }
    public function edit($id)
    {
        return $this->weddingHallsServices->edit($id);
    }
    public function update($id,Store $request)
    {
        return $this->weddingHallsServices->update($id,$request);
    }
    public function destroy($id)
    {
        return $this->weddingHallsServices->destroy($id);
    }
}
