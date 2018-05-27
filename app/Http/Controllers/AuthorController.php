<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreatePost;

class AuthorController extends Controller
{

    public function __construct(){
        $this->middleware('checkRole:author'); // :authorはロールを示す web.phpのprefixにも記載されている
    }


    // 管理パネルの左側サイドバーのAUTHORのところのdashboardに相当
    public function dashboard(){
        $posts = Post::where('user_id', Auth::id())->pluck('id')->toArray();
        //dump($posts);

        $allComments = Comment::whereIn('post_id', $posts)->get();
        //dump($allComments);

        $todayComments = $allComments->where('created_at', '>=', \Carbon\Carbon::today())->count();

        return view('author.dashboard', compact('allComments', 'todayComments'));
    }

    // 管理パネルの左側サイドバーのAUTHORのところのpostsに相当
    public function posts(){
        return view('author.posts');
    }

    // 管理パネルの左側サイドバーのAUTHORのところのcommentsに相当
    public function comments(){
        return view('author.comments');
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
}
