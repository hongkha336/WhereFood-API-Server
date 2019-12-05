<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class UserReportModel extends Model
{
    protected $table = 'user_report';
    protected $fillable = ['ReportID','UserAccount', 'ReportTypeID', 'FoodID','MetaData1', 'MetaData2', 'ReportDatetime','Status'];
    public $timestamps = true;
    //insert user report
    public static function insertUserReport($request)
    {
        return DB::table('user_report')->insert(
            [
                'UserAccount'    => $request->input('UserAccount'),
                'ReportTypeID'   => 1,
                'FoodID'         => $request->input('FoodID'),
                'MetaData2'      => $request->input('MetaData2'),
                'ReportDatetime' => $request->input('ReportDatetime'),
                'Status'         => 2
            ]
        );
    }
}
    