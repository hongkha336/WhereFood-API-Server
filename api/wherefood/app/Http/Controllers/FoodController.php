<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FoodModel;
use App\FoodCommentModel;
use App\FoodSurveyModel;

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
    //insert comment food
    public function insertFoodComment(Request $foodcomment)
    {
        $result=FoodCommentModel::insertFoodComment($foodcomment);
        echo $result;
    }
    //insert food survey
    public function insertFoodSurvey(Request $foodsurvey)
    {
        $result=FoodSurveyModel::insertFoodSurvey($foodsurvey);
        echo $result;
    }
  
}
