<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class PermalinkModel extends Model
{
    protected $table = 'permalink_picture';
    protected $fillable = ['FCP_ID', 'PicturePermalink', 'Token'];
    public $timestamps = true;

    //get permalink_picture by ID of food
    public static function getPermalinkPictureByID($id)
    {
        return DB::table('permalink_picture')
        ->join('food', 'permalink_picture.Token', '=', 'food.PictureToken')
        ->select('permalink_picture.PicturePermalink')
        ->where("food.FoodID","$id")
        ->get();
    }
}
