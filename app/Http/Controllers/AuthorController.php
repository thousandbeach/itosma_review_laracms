<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function __construct(){
        $this->middleware('checkRole:author'); // :authorはロールを示す web.phpのprefixにも記載されている
    }


    // 管理パネルの左側サイドバーのAUTHORのところのdashboardに相当
    public function dashboard(){

    }

    // 管理パネルの左側サイドバーのAUTHORのところのpostsに相当
    public function posts(){

    }

    // 管理パネルの左側サイドバーのAUTHORのところのcommentsに相当
    public function comments(){

    }
}
