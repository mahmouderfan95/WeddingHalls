<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\WeddingHallCategoryController;
use App\Http\Controllers\Api\WeddingHallController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// auth routes
Route::group(['middleware' => 'auth:sanctum'],function(){

});
Route::group(['middleware' => 'guest:sanctum'],function(){
    // register api
    Route::post('user/register',[AuthController::class,'register']);
    // login api
    Route::post('user/login',[AuthController::class,'login']);
    // get wedding hall categories
    Route::get('wedding-hall-categories',[WeddingHallCategoryController::class,'index']);
    // get wedding hall route
    Route::get('wedding-halls',[WeddingHallController::class,'index']);
    // get wedding halls details
    Route::get('wedding-halls/{id}',[WeddingHallController::class,'show']);
    /// get wedding halls by category
    Route::get('wedding-halls/category/{cat_id}',[WeddingHallController::class,'getWeddingByCategory']);
});
