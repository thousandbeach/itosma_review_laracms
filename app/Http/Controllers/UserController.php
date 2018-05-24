<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // 管理パネルの左側サイドバーのUSERのところのdashboardに相当
    public function dashboard(){
        return view('user.dashboard');
    }

    // 管理パネルの左側サイドバーのUSERのところのcommentsに相当
    public function comments(){
        return view('user.comments');
    }
}
