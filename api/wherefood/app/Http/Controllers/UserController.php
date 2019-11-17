<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;
use Carbon\Carbon;


class UserController extends Controller
{
    
    //get all user
    public function getAllUser()
    {
        $res= UserModel::getAllUser();
        return response()->json($res,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    //update user true
    public function updateUserTrue(Request $infoUser)
    {
        $res= UserModel::updateUserTrue($infoUser);
        return response()->json($res,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    //update user false
    public function updateUserFalse(Request $infoUser)
    {
        $res= UserModel::updateUserFalse($infoUser);
        return response()->json($res,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    //register
    public function registerAccount(Request $request)
    {
        $res= UserModel::registerAccount($request);
        echo $res;
    }

    //login
    public function loginAccount(Request $request)
    {
        $res= UserModel::loginAccount($request);
        echo $res;
    }

    //check exist phone number
    public function checkExistPhoneNumber($phoneNumber)
    {
        $res= UserModel::checkExistPhoneNumber($phoneNumber);
        echo $res;
    }
}
