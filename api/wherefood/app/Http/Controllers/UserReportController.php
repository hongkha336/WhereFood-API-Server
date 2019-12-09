<?php

namespace App\Http\Controllers;

use App\UserReportModel; 
use Illuminate\Http\Request;

class UserReportController extends Controller
{
    //insert user report
    public function insertUserReport(Request $request)
    {
        $res= UserReportModel::insertUserReport($request);
        echo $res;
    }     
}
