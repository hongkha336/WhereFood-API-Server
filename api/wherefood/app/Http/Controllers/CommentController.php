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

    //get commentcontent by foodid 
    public function getCommentContentByFoodID($foodID)
    {
        $res=FoodCommentModel::getCommentContentByFoodID($foodID);
        return response()->json($res,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    //update status comment by tokencomment
    public function updateContentCommentByCmtToken(Request $request)
    {
        $result=FoodCommentModel::updateContentCommentByCmtToken($request);
        echo $result;
    }
}

