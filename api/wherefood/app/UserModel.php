<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $fillable = ['UserAccount', 'HashPassWord', 'RegisteredTime','FullName', 'DateOfBirth', 'PhoneNumber','Status'];
    public $timestamps = true;

    
    //get all user 
    static function getAllUser()
    {
        return DB::table('user')->get();
    }

    //update user true
    static function updateUserTrue($request)
    {
        return DB::table('user')->where('UserAccount',$request->input('UserAccount'))->update(
            [
                'Status'=> 1
            ]
        );
    }
    //update user false
    static function updateUserFalse($request)
    {
        $a= $request->input('UserAccount');
        return DB::table('user')->where('UserAccount',$request->input('UserAccount'))->update(
            [
                'Status'=> 0
            ]
        );
    }
}
