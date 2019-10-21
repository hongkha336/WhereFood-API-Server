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

    //get surveypoint by foodid and userid
    public function getSurveyPointByFoodIDAndUserID(Request $foodsurvey)
    {
        $result=FoodSurveyModel::getSurveyPointByFoodIDAndUserID($foodsurvey);
        echo $result;
    }
}
