<?php
namespace App\Services\API;
use App\Traits\API\Helper;
class WeddingHallCategoryServices{
    use Helper;
    public function index()
    {
        $data = $this->getModel()::get(['id','name']);
        if($data->count() > 0)
            return $this->MakeResponse($data,'success message',true,200);
        return $this->MakeResponse([],'data not found',false,400);
    }
    public function getModel()
    {
        return 'App\Models\WeddingHallCategory';
    }
}
