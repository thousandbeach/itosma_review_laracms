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
        return view('author.dashboard');
    }

    // 管理パネルの左側サイドバーのAUTHORのところのpostsに相当
    public function posts(){
        return view('author.posts');
    }

    // 管理パネルの左側サイドバーのAUTHORのところのcommentsに相当
    public function comments(){
        return view('author.comments');
    }
}
