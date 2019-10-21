<?php

namespace App\Http\Controllers;

use App\FoodSurveyModel;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    //insert food survey
    public function insertFoodSurvey(Request $foodsurvey)
    {
        $result=FoodSurveyModel::insertFoodSurvey($foodsurvey);
        echo $result;
    }
}
