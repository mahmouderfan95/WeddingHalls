<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Login;
use App\Services\AuthServices;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(public AuthServices $authServices){}
    public function loginPage()
    {
        return $this->authServices->loginPage();
    }
    public function postLogin(Login $request)
    {
        return $this->authServices->postLogin($request);
    }
    public function dashboard(){
        return $this->authServices->dashboard();
    }
    public function logout()
    {
        return $this->authServices->logout();
    }
}
