<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Comment;
use App\Post;
use App\User;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePost;
use App\Http\Requests\UserUpdate;
use App\Charts\DashboardChart;

class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('checkRole:admin'); // :adminはロールを示す
        $this->middleware('auth'); // ログインしてないときに管理パネル（/user/comments等）にアクセスしたときに、エラーになっていたのを、loginページが表示されるようにした
    }

    // 管理パネルの左側サイドバーのADMINのところのdashboardに相当
    public function dashboard(){

        $allMessages = Message::all();
        //dump($allMessages);

        $todayMessages = $allMessages->where('created_at', '>=', \Carbon\Carbon::today())->count();
        //dump($todayMessages);

        // Chart.js 関連
        $chart = new DashboardChart;
        // Carbon\Carbon
        $days = $this->generateDateRange(Carbon::now()->subDays(30), Carbon::now());

        $posts = [];

        foreach ($days as $day) {
            $posts[] = Post::whereDate('created_at', $day)->count();
        }

        $chart->dataset('Posts', 'line', $posts);
        $chart->labels($days);

        return view('admin.dashboard', compact('allMessages','todayMessages','chart'));
    }

    // Chart.js関連
    private function generateDateRange(Carbon $start_date, Carbon $end_date){
        $dates = [];
        for($date = $start_date; $date->lte($end_date); $date->addDay()){
            $dates[] = $date->format('Y-m-d');
        }
        return $dates;
    }

    // 管理パネルの左側サイドバーのADMINのところのContactsに相当
    public function contacts(){
        $messages = Message::paginate(10);
        return view('admin.contact', compact('messages'));
    }

    public function deleteMessage(){
        $message = Contact::where('id', $id)->first();
        $message->delete();
        return back();
    }

    // 管理パネルの左側サイドバーのADMINのところのcommentsに相当
    public function comments(){
        //$comments = Comment::all();
        $comments = Comment::paginate(10);
        return view('admin.comments', compact('comments'));
    }

    public function deleteComment($id){
        $comment = Comment::where('id', $id)->first();
        $comment->delete();
        return back();
    }

    // 管理パネルの左側サイドバーのADMINのところのpostsに相当
    public function posts(){
        //$posts = Post::all();
        $posts = Post::paginate(10);
        return view('admin.posts', compact('posts'));
    }

    public function postEdit($id){
        $post = Post::where('id', $id)->first();
        return view('admin.editPost', compact('post'));
    }

    public function postEditPost(CreatePost $request, $id){
        $post = Post::where('id', $id)->first();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->save();

        return back()->with('success', '記事内容を更新しました。');
    }

    public function deletePost($id){
        $post = Post::where('id', $id)->first();
        $post->delete();

        return back();
    }

    // 管理パネルの左側サイドバーのADMINのところのusersに相当
    public function users(){
        //$users = User::all();
        $users = User::paginate(10);
        return view('admin.users', compact('users'));
    }

    // 管理者のユーザー編集
    public function editUser($id){
        $user = User::where('id', $id)->first();
        return view('admin.EditUser', compact('user'));
    }

    public function editUserPost(UserUpdate $request, $id){
        $user = User::where('id', $id)->first();
        $user->name = $request['name'];
        $user->email = $request['email'];
        if($request['author'] == 1){
            $user->author = true;
        } elseif($request['admin'] == 1) {
            $user->admin = true;
        }
        $user->save();
        return back()->with('success', 'ユーザー情報の更新が完了いたしました！');
    }

    public function deleteUser($id){
        $user = User::where('id', $id)->first();
        $user->delete();

        return back();
    }

}
