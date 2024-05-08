<?php
namespace App\Services\API;

use App\Http\Requests\API\BookingRequest;
use App\Http\Resources\API\WeddingHallResource;
use App\Models\WeddingHallBooking;
use App\Traits\API\Helper;
use Illuminate\Http\Request;

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
    public function getWeddingByCategory($id)
    {
        $data = $this->getModel()::where('wedding_hall_category_id',$id)->get();
        if($data->count() > 0)
            return $this->MakeResponse(WeddingHallResource::collection($data),'success message',true,200);
        return $this->MakeResponse([],'data not found',false,400);
    }
    public function booking(BookingRequest $request)
    {
        if($this->checkWeddingHallActive($request)){
            return $this->MakeResponse([],'Wedding Hall Not Active',false,400);
        }
            WeddingHallBooking::create(['wedding_hall_id' => $request->wedding_hall_id,'user_id' => auth()->user()->id,'day_of_booking' => $request->day_of_booking]);
            return $this->MakeResponse([],'Wedding Hall Booking Success',true,200);
    }
    private function checkWeddingHallActive(Request $request)
    {
        $data = WeddingHallBooking::where('wedding_hall_id',$request->wedding_hall_id)
        ->where('user_id',auth()->user()->id)
        ->where('day_of_booking',$request->day_of_booking)
        ->exists();
        return $data;
    }
    public function getModel()
    {
        return 'App\Models\WeddingHall';
    }
}
