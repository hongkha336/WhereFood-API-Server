<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class RestaurantModel extends Model
{
    protected $table = 'restaurant';
    protected $fillable = ['RestaurantID', 'RestaurantName', 'RestaurantAddress','Status', 'Longitude', 'Latitude'];
    public $timestamps = true;

    //get all restaurant

    public static function getAllRestaurant()
    {
        return DB::table('restaurant')->get();
    }

    //search restaurant with name or description
    public static function getRestaurantByNameOrByDescription($keyword)
    {
        $user=DB::table('restaurant')
        ->where("Status","=",1)
        ->where("RestaurantName","LIKE","%$keyword%")
        ->orWhere("RestaurantAddress","LIKE","%$keyword%")
        ->get();
        return $user;
    }

}
