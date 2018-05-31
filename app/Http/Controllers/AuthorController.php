<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreatePost;
use App\Charts\DashboardChart;

class AuthorController extends Controller
{

    public function __construct(){
        $this->middleware('checkRole:author'); // :authorはロールを示す web.phpのprefixにも記載されている
        $this->middleware('auth'); // ログインしてないときに管理パネル（/user/comments等）にアクセスしたときに、エラーになっていたのを、loginページが表示されるようにした
    }


    // 管理パネルの左側サイドバーのAUTHORのところのdashboardに相当
    public function dashboard(){
        $posts = Post::where('user_id', Auth::id())->pluck('id')->toArray();
        //dump($posts);

        $allComments = Comment::whereIn('post_id', $posts)->get();
        //dump($allComments);

        $todayComments = $allComments->where('created_at', '>=', \Carbon\Carbon::today())->count();

        // Chart.js 関連
        $chart = new DashboardChart;
        // Carbon\Carbon
        $days = $this->generateDateRange(Carbon::now()->subDays(30), Carbon::now());

        $posts = [];

        foreach ($days as $day) {
            $posts[] = Post::whereDate('created_at', $day)->where('user_id', Auth::id())->count();
        }

        $chart->dataset('Posts', 'line', $posts);
        $chart->labels($days);

        return view('author.dashboard', compact('allComments', 'todayComments', 'chart'));
    }

    // Chart.js関連
    private function generateDateRange(Carbon $start_date, Carbon $end_date){
        $dates = [];
        for($date = $start_date; $date->lte($end_date); $date->addDay()){
            $dates[] = $date->format('Y-m-d');
        }
        return $dates;
    }

    // 管理パネルの左側サイドバーのAUTHORのところのpostsに相当
    public function posts(){
        return view('author.posts');
    }

    // 管理パネルの左側サイドバーのAUTHORのところのcommentsに相当
    public function comments(){
        $posts = Post::where('user_id', Auth::id())->pluck('id')->toArray();
        $comments = Comment::whereIn('post_id', $posts)->get();
        return view('author.comments', compact('comments'));
    }

    public function newPost(){
        return view('author.newPost');
    }

    public function createPost(CreatePost $request){

        $post = new Post;
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->user_id = Auth::id();
        $post->save();

        // 右の場合だと、Auth::id() の現在認証されているユーザーのID取得にならzy、エラーとなる。$post->fill($request->all())->save();

        return back()->with('success', '新規記事の投稿完了！');
    }

    // 記事の編集機能
    public function postEdit($id){
        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
        return view('author.editPost', compact('post'));
    }

    public function postEditPost(CreatePost $request, $id){
        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->save();

        return back()->with('success', '記事内容を更新しました。');
    }

    public function deletePost($id){
        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
        $post->delete();

        return back();
    }
}
