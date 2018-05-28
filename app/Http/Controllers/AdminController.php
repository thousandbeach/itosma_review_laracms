<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePost;

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

    // 管理パネルの左側サイドバーのADMINのところのcommentsに相当
    public function comments(){
        return view('admin.comments');
    }

    // 管理パネルの左側サイドバーのADMINのところのpostsに相当
    public function posts(){
        $posts = Post::all();
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
        return view('admin.users');
    }

}
