<?php
namespace App\Services;

use App\Http\Requests\Admin\Login;
use App\Services\Admin\AlertService;
use Illuminate\Http\Request;

class AuthServices{
    public function __construct(public AlertService $alertService){}
    public function loginPage()
    {
        return view('Admin.Auth.login');
    }
    public function postLogin(Login $request)
    {
        try{
            $request->validated();
            if(auth()->guard('web')->attempt(['email' => $request->email,'password' => $request->password,'type' => 'admin'])){
                return redirect(route('admin.dashboard'));
            }else{
                return redirect()->back();
            }
        }catch (\Exception $exception){
            return $this->alertService->getAlertMessageError('error message',$exception->getMessage());
        }
    }
    public function dashboard(){
        return view('Admin.dashboard');
    }
    public function logout()
    {
        auth('web')->logout();
        return redirect(route('admin.login'));
    }
}
