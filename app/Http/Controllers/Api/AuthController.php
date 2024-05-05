<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\Login;
use App\Http\Requests\API\Auth\Register;
use App\Services\API\AuthServices;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(public AuthServices $authServices){}
    public function register(Register $request)
    {
        return $this->authServices->register($request);
    }
    public function login(Login $request)
    {
        return $this->authServices->login($request);
    }
}
