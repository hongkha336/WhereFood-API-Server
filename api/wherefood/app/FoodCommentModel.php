<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class FoodCommentModel extends Model
{
    protected $table = 'food_comment';
    protected $fillable = ['FoodID', 'UserID', 'CommentID','CommentToken', 'CommentContent','SurveyPoint','datetime_comment', 'Status'];
    public $timestamps = true;

    //insert comment for food
    public static function insertCommentFood($foodcomment)
    {
        return DB::table('food_comment')->insert(
            [
                'FoodID'            => $foodcomment->input('FoodID'),
                'UserID'            => $foodcomment->input('UserID'),
                'CommentToken'      => $foodcomment->input('CommentToken'),
                'CommentContent'    => $foodcomment->input('CommentContent'),
                'SurveyPoint'       => $foodcomment->input('SurveyPoint'),
                'datetime_comment'  => $foodcomment->input('datetime_comment'),
                'Status'            => 1
            ]
        );
    }

    //get commentcontent by foodid 
    public static function getCommentContentByFoodID($foodID)
    {
        return DB::table('food_comment')
        ->select('UserID as UserAccount','CommentContent')
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

    //get commentcontent and picture by foodid 
    public static function getCommentContentAndPictureByFoodID($foodID)
    {
        $res=array();
        $picture=array();
        $res= DB::table('food_comment')
        ->select('UserID as UserAccount','CommentContent','CommentToken','SurveyPoint','datetime_comment')
        ->where('FoodID',$foodID)
        ->where('Status',1)
        ->get();
        foreach($res as $comment)
        {
            $picture=DB::table('permalink_picture')
            ->select('PicturePermalink')
            ->where('Token',$comment->CommentToken)
            ->get();
            if(count($picture)>0)
            {
                $cp=(object)[];
                for ($i = 0; $i < count($picture); $i++) {
                    $cp->$i=$picture[$i]->PicturePermalink;
                }
                $comment->PicturePermalink=$cp;
            }else
            {
                $comment->PicturePermalink=null;
            }
            unset($comment->CommentToken);
        }
        unset($picture);    
        return $res;
    }
    //get commentcontent and picture by foodid join table
    public static function getCommentContentAndPictureByFoodIDjoinTable($foodID)
    {
        return DB::table('food_comment')
        ->leftJoin('permalink_picture', 'food_comment.CommentToken', '=', 'permalink_picture.Token')
        ->select('UserID as UserAccount','CommentContent','permalink_picture.PicturePermalink','CommentID','SurveyPoint','datetime_comment')
        ->where('FoodID',$foodID)
        ->where('Status',1)
        ->orderBy('CommentID')
        ->get();
    }
}
