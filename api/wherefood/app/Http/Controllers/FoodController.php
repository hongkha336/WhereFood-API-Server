<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FoodModel;

class FoodController extends Controller
{
    //get all food in table
    public function getAllFood()
    {
        $listFood=FoodModel::getAllFood();
        return response()->json($listFood,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
    //get all food in table by ID
    public function getFoodByID($id)
    {
        $listFood=FoodModel::getFoodByID($id);
        return response()->json($listFood,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
    //get all food when search
    public function getFood($info)
    {
        $listFood=FoodModel::getFood($info);
        return response()->json($listFood,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
    // update status food by id food
    public function updateStatusFoodByIdFood(Request $request)
    {
        $result=FoodModel::updateStatusFoodByIdFood($request);
        echo $result;
    }
    // update food by id food
    public function updateFoodByIdFood(Request $request)
    {
        $result=FoodModel::updateFoodByIdFood($request);
        echo $result;
    }
    //getfoodandpicture
    public function getFoodAndPicture($info)
    {
        $listFood=FoodModel::getFoodAndPicture($info);
        return response()->json($listFood,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    //add Food 
    public function addFood(Request $request)
    {
        $result=FoodModel::addFood($request);
        echo $result;
    }
    //get food by name
    public function getFoodByName($foodName)
    {
        $listFood=FoodModel::getFoodByName($foodName);
        return response()->json($listFood,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    //get all food active and deactive 
    public function getAllFoodActiveAndDeactive()
    {
        $listFood=FoodModel::getAllFoodActiveAndDeactive();
        return response()->json($listFood,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    //get all food waitting
    public function getAllFoodWaitting()
    {
        $listFoodWait=FoodModel::getAllFoodWaitting();
        return response()->json($listFoodWait,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    //update status active
    public function updateStatusActive(Request $request)
    {
        $rs=FoodModel::updateStatusActive($request);
        echo $rs;
    }
    //update status deactive
    public function updateStatusDeactive(Request $request)
    {
        $rs=FoodModel::updateStatusDeactive($request);
        echo $rs;
    }

    //get all food active and deactive with information of restaurant
    public function getAllFoodActiveAndDeactiveWithInfoRestaurant()
    {
        $listFood=FoodModel::getAllFoodActiveAndDeactiveWithInfoRestaurant();
        return response()->json($listFood,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    //get all food waitting with information of restaurant
    public function getAllFoodWaittingWithInfoRestaurant()
    {
        $listFoodWait=FoodModel::getAllFoodWaittingWithInfoRestaurant();
        return response()->json($listFoodWait,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
    //get food by ID nostatus
    public function getFoodByIDNoStatus($id)
    {
        $food=FoodModel::getFoodByIDNoStatus($id);
        return response()->json($food,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    //add Food 
    public function addFoodWithInfoRestaurant(Request $request)
    {
        $result=FoodModel::addFoodWithInfoRestaurant($request);
        echo $result;
    }
}
