<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdate;

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

    // 管理パネルのprofileに相当
    public function profile(){
        return view('user.profile');
    }

    // 管理パネルのprofileの処理に相当
    public function profilePost(UserUpdate $request){

        $user = Auth::user();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        return back();
    }
}
