<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class FoodCommentModel extends Model
{
    protected $table = 'food_comment';
    protected $fillable = ['FoodID', 'UserID', 'CommentID','CommentToken', 'CommentContent', 'Status'];
    public $timestamps = true;

    //insert comment for food
    public static function insertCommentFood($foodcomment)
    {
        return DB::table('food_comment')->insert(
            [
                'FoodID'         => $foodcomment->input('FoodID'),
                'UserID'         => $foodcomment->input('UserID'),
                'CommentID'      => $foodcomment->input('CommentID'),
                'CommentToken'   => $foodcomment->input('CommentToken'),
                'CommentContent' => $foodcomment->input('CommentContent'),
                'Status'         => $foodcomment->input('Status')
            ]
        );
    }

    //get commentcontent by foodid 
    public static function getCommentContentByFoodID($foodID)
    {
        return DB::table('food_comment')
        ->select('UserID','CommentContent')
        ->where('FoodID',$foodID)
        ->where('Status',1)
        ->get();
    }
    
    //update comment by tokencomment
    public static function updateContentCommentByCmtToken($request)
    {
        return DB::table('food_comment')
        ->where('CommentToken',$request->input('CommentToken'))
        ->update(
            [
                'CommentContent'=>$request->input('CommentContent')
            ]
        );
    }

    //remove comment by foodID
    public static function removeCommentByFoodID($request)
    {
        return DB::table('food_comment')
        ->where('FoodID',$request->input('FoodID'))
        ->update(
            [
                'Status'=>0
            ]
        );
    }
    //remove comment by foodID and userID
    public static function removeCommentByFoodIDAndUserID($request)
    {
        return DB::table('food_comment')
        ->where('FoodID',$request->input('FoodID'))
        ->where('UserID',$request->input('UserID'))
        ->update(
            [
                'Status'=>0
            ]
        );
    }
}
