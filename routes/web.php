<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WeddingHallsCategoryController;
use App\Http\Controllers\Admin\WeddingHallsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',function(){
    return redirect()->route('admin.login');
});
Route::get('login-page',[AuthController::class,'loginPage'])->name('admin.login');
Route::post('login',[AuthController::class,'postLogin'])->name('admin.post.login');
Route::group(['middleware' => 'auth:web'],function(){
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('admin.dashboard');
    Route::post('logout',[AuthController::class,'logout'])->name('admin.logout');
    //users route
    Route::resource('users',UserController::class)->except(['show']);
    // wedding halls categories
    Route::resource('wedding-halls-categories',WeddingHallsCategoryController::class)->except(['show']);
    // wedding halls
    Route::resource('wedding-halls',WeddingHallsController::class)->except(['show']);
});
