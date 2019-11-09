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
    public function getFoodByName($foodName)
    {
        $listFood=FoodModel::getFoodByName($foodName);
        return response()->json($listFood,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
    public function uploadImageFood(Request $request)
    {
        $path  = $request->file('photo')->move(base_path().("/pictures"),$request->file('photo')->getClientOriginalName());
        $photoURL=base_path().("/pictures/".$filename);
        return response()->json(['url'=>$photoURL],200);
    }

}
