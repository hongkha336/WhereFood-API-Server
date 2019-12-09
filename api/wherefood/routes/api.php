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
Route::group(['prefix'=>'food'],function(){
    //get
    Route::get('/getallfood'        ,"FoodController@getAllFood");
    Route::get('/getfoodbyid/{id}'  ,"FoodController@getFoodByID");
    Route::get('/getfood/{info}'    ,"FoodController@getFood");
    Route::get('/getfoodandpicture/{info}',"FoodController@getFoodAndPicture");
    Route::get('/getfoodbyname/{info}',"FoodController@getFoodByName");
    Route::get('/getallfoodactiveanddeactive',"FoodController@getAllFoodActiveAndDeactive");
    Route::get('/getallfoodwaitting',"FoodController@getAllFoodWaitting");
    Route::get('/getallfoodactiveanddeactivewithinforestaurant',"FoodController@getAllFoodActiveAndDeactiveWithInfoRestaurant");
    Route::get('/getallfoodwaittingwithinforestaurant',"FoodController@getAllFoodWaittingWithInfoRestaurant");
    Route::get('/getfoodbyidnostatus/{id}',"FoodController@getFoodByIDNoStatus");
    //post
    Route::post('/updatestatusfood',"FoodController@updateStatusFoodByIdFood");
    Route::post('/updatefood',"FoodController@updateFoodByIdFood");
    Route::post('/addfood',"FoodController@addFood");
    Route::post('/uploadimagefood',"FoodController@uploadImageFood");
    Route::post('/updatestatusactive',"FoodController@updateStatusActive");
    Route::post('/updatestatusdeactive',"FoodController@updateStatusDeactive");
    Route::post('/addfoodwithinforestaurant',"FoodController@addFoodWithInfoRestaurant");
});
//list api for food comment
Route::group(['prefix'=>'foodcomment'],function(){
    //get
    Route::get('/getcommentcontentbyfoodid/{foodid}',"CommentController@getCommentContentByFoodID");
    Route::get('/getcommentcontentandpicturebyfoodid/{foodid}',"CommentController@getCommentContentAndPictureByFoodID");
    Route::get('/getcommentcontentandpicturebyfoodidjointable/{foodid}',"CommentController@getCommentContentAndPictureByFoodIDjoinTable");
    //post
    Route::post('/insertfoodcomment',"CommentController@insertFoodComment");
    Route::post('/updatecommentcmtbytokencmt',"CommentController@updateContentCommentByCmtToken");
    Route::post('/removecommentbyfoodid',"CommentController@removeCommentByFoodID");
    Route::post('/removecommentbyfoodidanduserid',"CommentController@removeCommentByFoodIDAndUserID");
});

//list api for food survey
Route::group(['prefix'=>'foodsurvey'],function(){
    //get
    Route::post('/getsurveypointbyfoodidanduserid/{foodID}/{userID}',"SurveyController@getSurveyPointByFoodIDAndUserID");
    //post
    Route::post('/insertfoodsurvey',"SurveyController@insertFoodSurvey");
});

//list route of table permalink
Route::group(['prefix'=>'permalink'],function(){
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
    //post
    Route::post('/loginadmin',"AdminController@loginAdmin");
});

//route user
Route::group(['prefix'=>'user'],function(){
    //get
    Route::get('/getalluser',"UserController@getAllUser");
    Route::get('/checkexistphonenumber/{phonenumber}',"UserController@checkExistPhoneNumber");
    Route::get('/getuserbyuseraccount/{useraccount}',"UserController@getUserByAccount");
    //post
    Route::post('/insertuser',"UserController@insertUser");
    Route::post('/updatestatustrue',"UserController@updateUserTrue");
    Route::post('/updatestatusfalse',"UserController@updateUserFalse");
    Route::post('/registeraccount',"UserController@registerAccount");
    Route::post('/loginaccount',"UserController@loginAccount");
    Route::post('/updateuserbyuseraccount',"UserController@updateuUserByUserAccount");
});

//route restaurant
Route::group(['prefix'=>'restaurant'],function(){
    //get
    Route::get('/getallrestaurant',"RestaurantController@getAllRestaurant");
    Route::get('/getrestaurantbynameorbydescription/{keyword}',"RestaurantController@getRestaurantByNameOrByDescription");
    
});

//route user report
Route::group(['prefix'=>'userreport'],function(){
    //post
    Route::post('/insertuserreport',"UserReportController@insertUserReport");
    
});

//Load image
Route::post('/uploadhinh',function(Request $request){
    $filename=$request->file('photo')->getClientOriginalName();
    $path  = $request->file('photo')->move(base_path().("/pictures"),$filename);
    $photoURL=base_path().("/pictures/".$filename);
    return response()->json(['url'=>$photoURL],200);
});

