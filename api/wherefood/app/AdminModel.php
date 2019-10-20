<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $fillable = ['Account', 'HashPassWord', 'Role','Status'];
    public $timestamps = true;

    //check username and password of admin
    static function loginAdmin($info)
    {
        $res=DB::table('admin')->where('HashPassWord',$info->HashPassWord)->where('Account', $info->Account)->first();
        return $res;
    }
}
