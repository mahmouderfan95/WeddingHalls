<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WeddingHallCategories\Store;
use App\Models\WeddingHallCategory;
use App\Services\Admin\WeddingHallsCategoryServices;
use Illuminate\Http\Request;


class WeddingHallsCategoryController extends Controller
{
    public function __construct(public WeddingHallsCategoryServices $weddingHallsCategoryServices){}
    public function index()
    {
        return $this->weddingHallsCategoryServices->index();
    }
    public function create()
    {
        return $this->weddingHallsCategoryServices->create();
    }
    public function store(Store $request)
    {
        return $this->weddingHallsCategoryServices->store($request);
    }
    public function edit($id)
    {
        return $this->weddingHallsCategoryServices->edit($id);
    }
    public function update($id,Store $request)
    {
        return $this->weddingHallsCategoryServices->update($id,$request);
    }
    public function destroy($id)
    {
        return $this->weddingHallsCategoryServices->destroy($id);
    }
}
