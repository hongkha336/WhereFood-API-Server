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
}
