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
    //get
    Route::get('/getallfood'        ,"FoodController@getAllFood");
    Route::get('/getfoodbyid/{id}'  ,"FoodController@getFoodByID");
    Route::get('/getfood/{info}'    ,"FoodController@getFood");
    Route::get('/getfoodandpicture/{info}',"FoodController@getFoodAndPicture");
    //post
    Route::post('/updatestatusfood',"FoodController@updateStatusFoodByIdFood");
    Route::post('/updatefood',"FoodController@updateFoodByIdFood");
});
//list api for food comment
Route::group(['prefix'=>'foodcomment','middleware'=>['wherefoodmiddleware']],function(){
    //get
    Route::get('/getcommentcontentbyfoodid/{foodid}',"CommentController@getCommentContentByFoodID");
    //post
    Route::post('/insertfoodcomment',"CommentController@insertFoodComment");
});

//list api for food survey
Route::group(['prefix'=>'foodsurvey','middleware'=>['wherefoodmiddleware']],function(){

    //get
    Route::post('/getsurveypointbyfoodidanduserid/{foodID}/{userID}',"SurveyController@getSurveyPointByFoodIDAndUserID");
    //post
    Route::post('/insertfoodsurvey',"SurveyController@insertFoodSurvey");
});

//list route of table permalink
Route::group(['prefix'=>'permalink','middleware'=>['wherefoodmiddleware']],function(){
    //get
    Route::get('/getpermalinkbyid/{id}',"PermalinkController@getPermalinkPictureByID");
});
//route error when don't have token
Route::get('/error',function(){
    return response()->json("You don't have permission to  rest this API",200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    echo "You don't have permission to  rest this API";
    })->name('error','[A-Za-z]+');

//route admin
Route::group(['prefix'=>'admin'],function(){
    //get
    Route::post('/loginadmin',"AdminController@loginAdmin");
});