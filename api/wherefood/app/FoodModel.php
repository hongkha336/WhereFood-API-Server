<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class FoodModel extends Model
{
    protected $table = 'food';
    protected $fillable = ['FoodID', 'FoodName', 'PictureToken','Prices', 'ShortDescription', 'LongDescription','AvgSurvey','RestaurantID','Status'];
    public $timestamps = true;

    //get all food in table
    public static function getAllFood()
    {
        return DB::table('food')->get();
    }
    //get all food in table by ID
    public static function getFoodByID($id)
    {
        return DB::table('food')
        ->where("FoodID",$id)
        ->where("Status",1)
        ->first(); 
    }
    //get all food when search
    public static function getFood($info) 
    {
        return DB::table('food')
        ->Select('FoodID', 'FoodName', 'PictureToken','Prices', 'ShortDescription', 'LongDescription','AvgSurvey','RestaurantID','Status')
        ->where("FoodName","LIKE","%$info%")
        ->where("Status",1)
        ->get();
    }
    // update status food by id food
    public static function updateStatusFoodByIdFood($request)
    {
        return DB::table('food')->where('FoodID',$request->input('FoodID'))->update(
            [
                'Status'=> $request->input('Status')
            ]
        );
    }
    // update food by id food
    public static function updateFoodByIdFood($request)
    {
        return DB::table('food')->where('FoodID',$request->input('FoodID'))->update(
            [
                'FoodName'          =>$request->input('FoodName'),
                'Prices'            =>$request->input('Prices'),
                'ShortDescription'  =>$request->input('ShortDescription'),
                'LongDescription'   =>$request->input('LongDescription')
            ]
        );
    }

    //getfoodandpicture
    public static function getFoodAndPicture($info)
    {
        return DB::table('food')
        ->select('FoodID', 'FoodName', 'PictureToken','Prices', 
        'ShortDescription', 'LongDescription','AvgSurvey','RestaurantID',
        DB::raw('(select PicturePermalink from permalink_picture where PictureToken  =   permalink_picture.Token order by FCP_ID asc limit 1) as PicturePermalink'))
        ->where("FoodName","LIKE","%$info%")
        ->get();
    }
    //add Food 
    public static function addFood($request)
    {
        return DB::table('food')->insert(
            [
                'FoodID'            => $request->input('FoodID'),
                'FoodName'          => $request->input('FoodName'),
                'PictureToken'      => $request->input('PictureToken'),
                'Prices'            => $request->input('Prices'),
                'ShortDescription'  => $request->input('ShortDescription'),
                'LongDescription'   => $request->input('LongDescription'),
                'AvgSurvey'         => 0,
                'RestaurantID'      => $request->input('RestaurantID'),
                'Status'            => 2
            ]
        );
    }
    public static function getFoodByName($foodName)
    {
        return DB::table('food')
        ->join('restaurant', 'food.RestaurantID', '=', 'restaurant.RestaurantID')
        ->select('FoodID', 'FoodName', 'PictureToken','Prices', 
        'ShortDescription', 'LongDescription','AvgSurvey','food.RestaurantID',
        'Latitude','Longitude',
        DB::raw('(select PicturePermalink from permalink_picture where PictureToken  =   permalink_picture.Token order by FCP_ID asc limit 1) as PicturePermalink'))
        ->where("FoodName","LIKE","%$foodName%")
        ->get();
    }
}
