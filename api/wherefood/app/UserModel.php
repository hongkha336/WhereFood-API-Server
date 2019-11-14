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

    //register
    public static function registerAccount($request)
    {
        $user=DB::table('user')
        ->where('UserAccount',$request->input('UserAccount'))
        ->first();
        if($user!=null)
        {
            return -5;//trùng user account
        }
        else
        {
            $user=DB::table('user')
            ->where('PhoneNumber', $request->input('PhoneNumber'))
            ->first();
            if($user!=null)
            {
                return -4;//trùng phonenumber
            }
            else
            {
                $pass=$request->input('HashPassWord');
                return DB::table('user')->insert(
                    [
                        'UserAccount'            => $request->input('UserAccount'),
                        'HashPassWord'          => md5($pass),
                        'RegisteredTime'      => $request->input('RegisteredTime'),
                        'FullName'            => $request->input('FullName'),
                        'DateOfBirth'  => $request->input('DateOfBirth'),
                        'PhoneNumber'   => $request->input('PhoneNumber'),
                        'Status'            => 1
                    ]
                );
            }
        }
    }
    //login
    public static function loginAccount($request)
    {
        $user=DB::table('user')
        ->where('UserAccount',$request->input('UserAccount'))
        ->orWhere('PhoneNumber',$request->input('UserAccount'))
        ->first();
        if($user==null)
        {
            return -5;//Không có username or pass
        }
        else
        {
            $pass=$request->input('HashPassWord');
            if($user->HashPassWord==md5($pass))
            {
                return 1; //thành công
            }
            else
            {
                return 0;//thất bại
            }
        }
    }
}
