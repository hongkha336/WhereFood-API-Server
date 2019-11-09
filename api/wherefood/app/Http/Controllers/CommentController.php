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

    //update comment by tokencomment
    public function updateContentCommentByCmtToken(Request $request)
    {
        $result=FoodCommentModel::updateContentCommentByCmtToken($request);
        echo $result;
    }
    //remove comment by foodID
    public function removeCommentByFoodID(Request $request)
    {
        $result=FoodCommentModel::removeCommentByFoodID($request);
        echo $result;
    }
    //remove comment by foodID and userID
    public function removeCommentByFoodIDAndUserID(Request $request)
    {
        $result=FoodCommentModel::removeCommentByFoodIDAndUserID($request);
        echo $result;
    }

    //get commentcontent and picture by foodid 
    public function getCommentContentAndPictureByFoodID($foodID)
    {
        $res=FoodCommentModel::getCommentContentAndPictureByFoodID($foodID);
        return response()->json($res,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    //get commentcontent and picture by foodid join table
    public function getCommentContentAndPictureByFoodIDjoinTable($foodID)
    {
        $res=FoodCommentModel::getCommentContentAndPictureByFoodIDjoinTable($foodID);
        return response()->json($res,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
}

