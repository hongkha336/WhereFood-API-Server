<?php

namespace App\Http\Controllers;
use App\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //login of admin
    public function loginAdmin(Request $request)
    {
        $res= AdminModel::loginAdmin($request);
        return response()->json($res,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
