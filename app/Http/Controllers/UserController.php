<?php

namespace App\Http\Controllers;

use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdate;
use Carbon\Carbon;
//use ConsoleTVs\Charts\Classes\Chartjs\Chart;
//use App\Charts;
use App\Charts\DashboardChart;


class UserController extends Controller
{

    //
    public function __construct(){
        $this->middleware('auth'); // ログインしてないときに管理パネル（/user/comments等）にアクセスしたときに、エラーになっていたのを、loginページが表示されるようにした
    }


    // 管理パネルの左側サイドバーのUSERのところのdashboardに相当
    public function dashboard(){
        // Chart.js 関連
        $chart = new DashboardChart;
        // Carbon\Carbon
        $days = $this->generateDateRange(Carbon::now()->subDays(30), Carbon::now());

        $commmets = [];

        foreach ($days as $day) {
            $comments[] = Comment::whereDate('created_at', $day)->where('user_id', Auth::id())->count();
        }

        $chart->dataset('Comments', 'line', $comments);
        $chart->labels($days);

        // Chart.js の組み込み方等をレクチャー
        return view('user.dashboard', compact('chart'));
    }

    // Chart.js関連
    private function generateDateRange(Carbon $start_date, Carbon $end_date){
        $dates = [];
        for($date = $start_date; $date->lte($end_date); $date->addDay()){
            $dates[] = $date->format('Y-m-d');
        }
        return $dates;
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
                return redirect()->back()->with("error", "現在のパスワードと入力したパスワードが一致しないようです...");
            }

/*
            if(strcmp($request['password'], $request['new_password']) == 0){
                return redirect()->back()->with("error", "新しいパスワードは現在のパスワードとは違うものをご入力ください。");
            }
*/
if($request['password'] == $request['newpassword']){
    return redirect()->back()->with("error", "新しいパスワードは現在のパスワードとは違うものをご入力ください。");
}
/*
if(!$request['new_password'] == $request['new_password_confirmation']){
    return redirect()->back()->with("error", "新しいパスワードと新しい確認用のパスワードは、全く同じものをご入力ください。");
}
*/
/*
            $validation = $request->validate([
                'password' => 'required|string|min:6|same:password',
                'new_password' => 'required|string|min:6|different:password|confirmed',
                'new_password_confirmation' => 'required|string|min:6|same:new_password',
            ]);
*/

$this->validate($request, [
    /*'password' => 'required|string|min:6',
    'new_password' => 'required|string|min:6|different:password|same:password',
    'new_password_confirmation' => 'required|string|min:6|same:new_password',*/
    /*'name' => 'required|string|max:180',
    'email' => 'required|string|email|max:180|unique:users,email_address,'.$user->id,
    'password' => 'required',*/
    'newpassword' => 'required|string|min:6|confirmed',
    'newpassword_confirmation' => 'required|string|min:6|same:newpassword',
]);


            $user->password = bcrypt($request['newpassword']);
            $user->save();

            return redirect()->back()->with('success', 'パスワードの変更完了！');
        }

        return back();
    }

    public function newComment(Request $request){
        $comment = new Comment;

        $this->validate($request, [
            'comment' => 'string|required|between:3,180',
        ]);

        $comment->post_id = $request['post'];
        $comment->user_id = Auth::id();
        $comment->content = $request['comment'];

        $comment->save();

        return redirect()->back()->with('success', 'コメントの投稿が完了しました！');
    }
}
