<?php

namespace App\Http\Controllers;
use App\FoodCommentModel;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    //insert comment food
    public function insertFoodComment(Request $foodcomment)
    {
        $result=FoodCommentModel::insertCommentFood($foodcomment);
        echo $result;
    }
}
