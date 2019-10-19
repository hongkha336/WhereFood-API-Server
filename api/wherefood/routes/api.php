<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'food','middleware'=>['MyMiddlewareToken']],function(){
    Route::get('/getallfood',"FoodController@getAllFood");
    Route::get('/getfoodbyid/{id}',"FoodController@getFoodByID");
});
Route::get('/error',function(){
    echo "You don't have permission to  rest this API";
    })->name('error','[A-Za-z]+');