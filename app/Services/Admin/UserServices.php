<?php
namespace App\Services\Admin;

use App\Http\Requests\Admin\users\Store;
use App\Models\User;
use App\Services\Admin\AlertService;

class UserServices{
    public $user;
    public $alertService;
    public function __construct(User $user, AlertService $alertService)
    {
        $this->user = $user;
        $this->alertService = $alertService;
    }

    public function index($perPage = 20)
    {
        try{
            $name = request()->has('search') ? request()->get('search') : null;
            $email = request()->has('email') ? request()->get('email') : null;
            $createDate = request()->has('created_at') ? request()->get('created_at') : null;
            $users = $this->user
                ->query()
                ->when($name && $name !== null,fn($q) => $q->where('name', 'like', "%$name%"))
                ->when($email && $email !== null,fn($q) => $q->where('email',$email))
                ->when($createDate && $createDate !== null,fn($q) => $q->where('created_at',$createDate))
                ->Customer()
                ->orderBy('id','desc')
                ->paginate($perPage);
            return view('Admin.users.index',compact('users'));
        }catch (\Exception $exception){
            return $this->alertService->getAlertMessageError('error message',$exception->getMessage());
        }
    }

    public function create()
    {
        try{
            return view('Admin.users.create');
        }catch (\Exception $exception){
            return $this->alertService->getAlertMessageError('error message',$exception->getMessage());
        }
    }

    public function store(Store $request)
    {
        try{
            $this->alertService->getAlertMessage('success message',trans('custom.success_messages.user_created'));
            $request->merge(['type' => 'user']);
            $user = $this->user
                ->create($request->validated());
            return redirect(route('users.index'));
        }catch (\Exception $exception){
            return $this->alertService->getAlertMessageError('error message',$exception->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('Admin.users.edit',compact('user'));
    }

    public function update(User $user,Store $request)
    {
        try{
            // return $request;
            $this->alertService->getAlertMessage('success message',trans('custom.success_messages.user_updated'));
            $user = $user->update($request->validated());
            return redirect(route('users.index'));
        }catch (\Exception $exception){
            return $this->alertService->getAlertMessageError('error message',$exception->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try{
            $this->alertService->getAlertMessage('success message',trans('custom.success_messages.user_deleted'));
            $user->delete();
            return redirect()->back();
        }catch (\Exception $exception){
            return $this->alertService->getAlertMessageError('error message',$exception->getMessage());
        }
    }
}
