<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//get user info
Route::get('/users/{id?}',[UserApiController::class,'showUser']);
//Add User data
Route::post('/addUsers',[UserApiController::class,'addusers']);
// add multiple users
Route::post('/addMultipleUsers',[UserApiController::class,'addMultipleUsers']);
