<?php
namespace App\Services\Admin;

use App\Models\User;
use App\Models\WeddingHall;
use App\Models\WeddingHallBooking;

class WeddingHallBookingServices{
    public function __construct(public AlertService $alertService ,public WeddingHallBooking $weddingHallBooking){}
    public function index($perPage = 20)
    {
        try {
            $weddingHalls = WeddingHall::get(['id','name']);
            $users = User::Customer()->get(['id','name']);
            $weddingHall = request()->has('wedding_hall_id') ? request()->get('wedding_hall_id') : null;
            $user = request()->has('user_id') ? request()->get('user_id') : null;
            $bookingDate = request()->has('day_of_booking') ? request()->get('day_of_booking') : null;
            $weddingHallsBooking = $this->weddingHallBooking
                ->query()
                ->when($weddingHall && $weddingHall !== null, fn ($q) => $q->where('wedding_hall_id',$weddingHall))
                ->when($user && $user !== null, fn ($q) => $q->where('user_id',$user))
                ->when($bookingDate && $bookingDate !== null, fn ($q) => $q->where('day_of_booking', $bookingDate))
                ->orderBy('id', 'desc')
                ->paginate($perPage);
            return view('Admin.wedding_halls_booking.index', compact('weddingHallsBooking','weddingHalls','users'));
        } catch (\Exception $exception) {
            return $this->alertService->getAlertMessageError('error message', $exception->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $this->alertService->getAlertMessage('success message', trans('custom.success_messages.user_deleted'));
            $weddingHallBooking = $this->getModelById($id);
            if($weddingHallBooking)
                $weddingHallBooking->delete();
                return redirect()->back();

        } catch (\Exception $exception) {
            return $this->alertService->getAlertMessageError('error message', $exception->getMessage());
        }
    }
    private function getModelById($id)
    {
        return $this->getModel()::find($id);
    }
    private function getModel()
    {
        return 'App\Models\WeddingHallBooking';
    }
}
