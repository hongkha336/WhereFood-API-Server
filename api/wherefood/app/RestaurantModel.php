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

}
