<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class FoodModel extends Model
{
    protected $table = 'food';
    protected $fillable = ['FoodID', 'UserID', 'CommentID','CommentToken', 'CommentContent', 'Status'];
    public $timestamps = true;

    public static function getAllFood()
    {
        return DB::table('food')->get();
    }
    public static function getFoodByID($id)
    {
        return DB::table('food')->where("FoodID",$id)->get();
    }
}
