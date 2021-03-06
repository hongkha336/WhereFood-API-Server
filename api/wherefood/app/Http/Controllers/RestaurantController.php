<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RestaurantModel;

class RestaurantController extends Controller
{
    //get all restaurant
    public function getAllRestaurant()
    {
        $listRestaurant=RestaurantModel::getAllRestaurant();
        return response()->json($listRestaurant,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    //search restaurant with name or description
    public function getRestaurantByNameOrByDescription($keyword)
    {
        $listRestaurant=RestaurantModel::getRestaurantByNameOrByDescription($keyword);
        return response()->json($listRestaurant,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
