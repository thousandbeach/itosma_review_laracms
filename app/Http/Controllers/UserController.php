<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdate;

class UserController extends Controller
{

    //
    public function __construct(){
        $this->middleware('auth'); // ログインしてないときに管理パネル（/user/comments等）にアクセスしたときに、エラーになっていたのを、loginページが表示されるようにした
    }

    // 管理パネルの左側サイドバーのUSERのところのdashboardに相当
    public function dashboard(){
        return view('user.dashboard');
    }

    // 管理パネルの左側サイドバーのUSERのところのcommentsに相当
    public function comments(){
        return view('user.comments');
    }

    // 管理パネルの左側サイドバーのcommentsの中身の削除処理に相当
    public function deleteComment($id){
        Comment::where('id', $id)->where('user_id', Auth::id())->delete();
        return back();

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

        if($request['password'] != "") {
            if(!(Hash::check($request['password'], Auth::user()->password))) {
                return redirect()->back()->with('error', "現在のパスワードと入力したパスワードが一致しないようです...");
            }

            if(strcmp($request['password'], $request['new_password']) == 0){
                return redirect()->back()->with('error', "新しいパスワードは現在のパスワードとは違うものをご入力ください。");
            }

            $validation = $request->validate([
                'password' => 'required|string|min:6',
                'new_password' => 'required|string|min:6|confirmed',
            ]);

            $user->password = bcrypt($request['new_password']);
            $user->save();

            return redirect()->back()->with('success', 'パスワードの変更完了！');
        }

        return back();
    }
}
