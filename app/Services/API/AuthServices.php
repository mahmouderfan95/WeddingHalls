<?php
namespace App\Services\API;

use App\Http\Requests\API\Auth\Login;
use App\Http\Requests\API\Auth\Register;
use App\Http\Resources\API\LoginResource;
use App\Models\User;
use App\Traits\API\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthServices{
    use Helper;
    public function register(Register $request)
    {
        // if (User::where('email',$request->email)->exists()){
        //     return $this->MakeResponse([],'email exist',false,404);
        // }
        $user = User::create($request->validated());
        // create token
        $token = $user->createToken('my-app')->plainTextToken;
        // event(new SendEmailAfterRegister($user));
        return $this->MakeResponseAuth($user,'success message',true,200,$token);
    }
    public function login(Login $request)
    {
        $request->validated();
        $user = User::where('email',$request->email)
            ->where('type','user')
            ->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return $this->MakeResponse([],'email or password not correct',false,401);
        }else{
            // create token
            $token = $user->createToken('my-app')->plainTextToken;
            // update device_token for user
            $user->update(['device_token' => $request->device_token]);
            return $this->MakeResponseAuth(new LoginResource($user),'user logged',true,200,$token);
        }
    }
}
