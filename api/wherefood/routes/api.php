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

//list route of table food
Route::group(['prefix'=>'food','middleware'=>['wherefoodmiddleware']],function(){
    Route::get('/getallfood',"FoodController@getAllFood");
    Route::get('/getfoodbyid/{id}',"FoodController@getFoodByID");
    Route::get('/getfood/{info}',"FoodController@getFood");
});

//list route of table permalink
Route::group(['prefix'=>'permalink','middleware'=>['wherefoodmiddleware']],function(){
    Route::get('/getpermalinkbyid/{id}',"PermalinkController@getPermalinkPictureByID");
});
//route error when don't have token
Route::get('/error',function(){
    echo "You don't have permission to  rest this API";
    })->name('error','[A-Za-z]+');

