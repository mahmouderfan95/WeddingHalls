<?php
namespace App\Services\Admin;
use App\Http\Requests\Admin\WeddingHallCategories\Store;
use App\Models\WeddingHallCategory;
use App\Services\Admin\AlertService;

class WeddingHallsCategoryServices{
    public $weddingHallsCategory;
    public $alertService;
    public function __construct(WeddingHallCategory $WeddingHallCategory, AlertService $alertService)
    {
        $this->weddingHallsCategory = $WeddingHallCategory;
        $this->alertService = $alertService;
    }

    public function index($perPage = 20)
    {
        try{
            $name = request()->has('search') ? request()->get('search') : null;
            $createDate = request()->has('created_at') ? request()->get('created_at') : null;
            $weddingHallsCategories = $this->weddingHallsCategory
                ->query()
                ->when($name && $name !== null,fn($q) => $q->where('name', 'like', "%$name%"))
                ->when($createDate && $createDate !== null,fn($q) => $q->where('created_at',$createDate))
                ->orderBy('id','desc')
                ->paginate($perPage);
            return view('Admin.wedding_halls_category.index',compact('weddingHallsCategories'));
        }catch (\Exception $exception){
            return $this->alertService->getAlertMessageError('error message',$exception->getMessage());
        }
    }

    public function create()
    {
        try{
            return view('Admin.wedding_halls_category.create');
        }catch (\Exception $exception){
            return $this->alertService->getAlertMessageError('error message',$exception->getMessage());
        }
    }

    public function store(Store $request)
    {
        try{
            $this->alertService->getAlertMessage('success message',trans('custom.success_messages.user_created'));
            $weddingCategoryHall = $this->weddingHallsCategory
                ->create($request->validated());
            return redirect(route('wedding-halls-categories.index'));
        }catch (\Exception $exception){
            return $this->alertService->getAlertMessageError('error message',$exception->getMessage());
        }
    }

    public function edit($id)
    {
        $weddingHallCategory = $this->getModelById($id);
        return view('Admin.wedding_halls_category.edit',compact('weddingHallCategory'));
    }

    public function update($id,Store $request)
    {
        try{
            $this->alertService->getAlertMessage('success message',trans('custom.success_messages.user_updated'));
            $weddingHallCategory = $this->getModelById($id);
            $weddingHallCategory->update($request->validated());
            return redirect(route('wedding-halls-categories.index'));
        }catch (\Exception $exception){
            return $this->alertService->getAlertMessageError('error message',$exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try{
            $this->alertService->getAlertMessage('success message',trans('custom.success_messages.user_deleted'));
            $weddingHallCategory = $this->getModelById($id);
            $weddingHallCategory->delete();
            return redirect()->back();
        }catch (\Exception $exception){
            return $this->alertService->getAlertMessageError('error message',$exception->getMessage());
        }
    }
    private function getModelById($id)
    {
        return $this->getModel()::find($id);
    }
    private function getModel()
    {
        return 'App\Models\WeddingHallCategory';
    }
}
