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
        ->Select('FoodID', 'FoodName', 'PictureToken','Prices', 'ShortDescription', 'LongDescription','AvgSurvey','RestaurantID')
        ->where("FoodName","LIKE","%$info%")
        ->where("Status",1)
        ->get();
    }
}
