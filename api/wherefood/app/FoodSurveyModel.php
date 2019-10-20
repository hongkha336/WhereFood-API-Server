<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class FoodSurveyModel extends Model
{
    protected $table = 'food_survey';
    protected $fillable = ['FoodID', 'UserID', 'SurveyPoint'];
    public $timestamps = true;

    //insert comment for food
    public static function insertFoodSurvey($foodsurvey)
    {
        return DB::table('food_survey')->insert(
            [
                'FoodID'      => $foodsurvey->input('FoodID'),
                'UserID'      => $foodsurvey->input('UserID'),
                'SurveyPoint' => $foodsurvey->input('SurveyPoint')
            ]
        );
    }
}
