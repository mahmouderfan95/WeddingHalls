<?php
namespace App\Services\API;

use App\Http\Resources\API\WeddingHallResource;
use App\Traits\API\Helper;
class WeddingHallServies{
    use Helper;
    public function index()
    {
        $data = $this->getModel()::with('weddingHallCategory')->get();
        if($data->count() > 0)
            return $this->MakeResponse(WeddingHallResource::collection($data),'success message',true,200);
        return $this->MakeResponse([],'data not found',false,400);
    }
    public function show($id)
    {
        $data = $this->getModel()::find($id);
        if($data)
            return $this->MakeResponse(new WeddingHallResource($data),'success message',true,200);
        return $this->MakeResponse([],'data not found',false,400);
    }
    public function getModel()
    {
        return 'App\Models\WeddingHall';
    }
}
