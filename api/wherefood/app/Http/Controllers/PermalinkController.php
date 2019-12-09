<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PermalinkModel;

class PermalinkController extends Controller
{
    //get permalink_picture by ID of food
    public function getPermalinkPictureByID($id)
    {
        $listPermalinkFood=PermalinkModel::getPermalinkPictureByID($id);
        return response()->json($listPermalinkFood,200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
