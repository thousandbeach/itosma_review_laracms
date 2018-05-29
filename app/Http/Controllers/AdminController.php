<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePost;
use App\Http\Requests\UserUpdate;

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
        $comments = Comment::all();
        return view('admin.comments', compact('comments'));
    }

    public function deleteComment($id){
        $comment = Comment::where('id', $id)->first();
        $comment->delete();
        return back();
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
        $users = User::all();
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
