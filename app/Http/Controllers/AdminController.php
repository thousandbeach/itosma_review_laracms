<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('checkRole:admin'); // :adminはロールを示す
    }

    // 管理パネルの左側サイドバーのADMINのところのdashboardに相当
    public function dashboard(){
        return view('admin.dashboard');
    }

    // 管理パネルの左側サイドバーのADMINのところのpostsに相当
    public function posts(){
        return view('admin.posts');
    }

    // 管理パネルの左側サイドバーのADMINのところのcommentsに相当
    public function comments(){
        return view('admin.comments');
    }

    // 管理パネルの左側サイドバーのADMINのところのusersに相当
    public function users(){
        return view('admin.users');
    }

}
