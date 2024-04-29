<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\users\Store;
use App\Models\User;
use App\Services\Admin\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(public UserServices $userServices){}
    public function index()
    {
        return $this->userServices->index();
    }
    public function create()
    {
        return $this->userServices->create();
    }
    public function store(Store $request)
    {
        return $this->userServices->store($request);
    }
    public function edit(User $user)
    {
        return $this->userServices->edit($user);
    }
    public function update(User $user,Store $request)
    {
        return $this->userServices->update($user,$request);
    }
    public function destroy(User $user)
    {
        return $this->userServices->destroy($user);
    }
}
