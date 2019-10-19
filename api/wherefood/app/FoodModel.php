<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class FoodModel extends Model
{
    protected $table = 'food';
    protected $fillable = ['FoodID', 'UserID', 'CommentID','CommentToken', 'CommentContent', 'Status'];
    public $timestamps = true;

    //get all food in table
    public static function getAllFood()
    {
        return DB::table('food')->get();
    }
    //get all food in table by ID
    public static function getFoodByID($id)
    {
        return DB::table('food')->where("FoodID",$id)->first(); 
    }
    //get all food when search
    public static function getFood($info)
    {
        return DB::table('food')->where("FoodName","LIKE","%$info%")->get();
    }
}
