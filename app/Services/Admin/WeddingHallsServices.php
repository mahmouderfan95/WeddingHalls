<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\WeddingHall\Store;
use App\Models\WeddingHall;
use App\Models\WeddingHallCategory;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class WeddingHallsServices
{
    use UploadImageTrait;
    public function __construct(public WeddingHall $weddingHall, public AlertService $alertService)
    {
    }
    public function index($perPage = 20)
    {
        try {
            $categories = WeddingHallCategory::get(['id','name']);
            $name = request()->has('search') ? request()->get('search') : null;
            $category = request()->has('wedding_hall_category_id') ? request()->get('wedding_hall_category_id') : null;
            $createDate = request()->has('created_at') ? request()->get('created_at') : null;
            $weddingHalls = $this->weddingHall
                ->query()
                ->when($name && $name !== null, fn ($q) => $q->where('name', 'like', "%$name%"))
                ->when($category && $category !== null, fn ($q) => $q->where('wedding_hall_category_id',$category))
                ->when($createDate && $createDate !== null, fn ($q) => $q->where('created_at', $createDate))
                ->orderBy('id', 'desc')
                ->paginate($perPage);
            return view('Admin.wedding_halls.index', compact('weddingHalls','categories'));
        } catch (\Exception $exception) {
            return $this->alertService->getAlertMessageError('error message', $exception->getMessage());
        }
    }

    public function create()
    {
        try {
            $weddingHallCategories = WeddingHallCategory::get(['id', 'name']);
            return view('Admin.wedding_halls.create', compact('weddingHallCategories'));
        } catch (\Exception $exception) {
            return $this->alertService->getAlertMessageError('error message', $exception->getMessage());
        }
    }

    public function store(Store $request)
    {
        try{
            $this->alertService->getAlertMessage('success message', trans('custom.success_messages.user_created'));
            $uploadImage = $this->uploadImage($request->image,'uploads/weddingHalls');
            $weddingHall = $this->weddingHall->create([
                'name' => $request->get('name'),
                'image' => $uploadImage,
                'price' => $request->get('price'),
                'wedding_hall_category_id' => $request->wedding_hall_category_id,
                'location' => $request->location,
                'profit_ratio' => $request->profit_ratio
            ]);
            return redirect(route('wedding-halls.index'));
        }catch (\Exception $exception){
            return $this->alertService->getAlertMessageError('error message',$exception->getMessage());
        }
    }

    public function edit($id)
    {
        $weddingHall = $this->getModelById($id);
        $weddingHallCategories = WeddingHallCategory::get(['id', 'name']);
        return view('Admin.wedding_halls.edit', compact('weddingHall','weddingHallCategories'));
    }

    public function update($id, Store $request)
    {
        try {
            $this->alertService->getAlertMessage('success message', trans('custom.success_messages.user_updated'));
            $weddingHall = $this->getModelById($id);
            $uploadImage = $this->uploadImage($request->image,'uploads/weddingHalls');
            if ($uploadImage !== null){
                $this->_checkImageExist($weddingHall->image,'uploads/weddingHalls/');
                $weddingHall->update([
                    'image' => $uploadImage,
                ]);
            }else{
                $weddingHall->update([
                    'name' => $request->get('name'),
                    'price' => $request->get('price'),
                    'wedding_hall_category_id' => $request->wedding_hall_category_id,
                    'location' => $request->location
                ]);
            }
            return redirect(route('wedding-halls.index'));
        } catch (\Exception $exception) {
            return $this->alertService->getAlertMessageError('error message', $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->alertService->getAlertMessage('success message', trans('custom.success_messages.user_deleted'));
            $weddingHall = $this->getModelById($id);
            if($weddingHall)
                $this->_checkImageExist($weddingHall->image,'uploads/weddingHalls/');
                $weddingHall->delete();
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
        return 'App\Models\WeddingHall';
    }
}
