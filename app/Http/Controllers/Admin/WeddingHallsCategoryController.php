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
    public function edit(WeddingHallCategory $weddingHallCategory)
    {
        return $this->weddingHallsCategoryServices->edit($weddingHallCategory);
    }
    public function update(WeddingHallCategory $weddingHallCategory,Store $request)
    {
        return $this->weddingHallsCategoryServices->update($weddingHallCategory,$request);
    }
    public function destroy(WeddingHallCategory $weddingHallCategory)
    {
        return $this->weddingHallsCategoryServices->destroy($weddingHallCategory);
    }
}
