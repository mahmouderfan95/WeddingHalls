<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
    public function login(Request $request)
    {
        return $this->authServices->login($request);
    }
}