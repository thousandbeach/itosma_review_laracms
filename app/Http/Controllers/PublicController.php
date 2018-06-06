<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // トップページ
    public function index(){

        $posts = Post::all();

        return view('welcome', compact('posts'));
    }

    // 投稿ページ
    public function singlePost(Post $post){
        return view('singlePost', compact('post'));
    }

    // 投稿ページ（名前ごとに一覧表示させるページ）
    public function singlePostAuthor(Post $post, User $user){
        return view('singlePostAuthor', compact('post', 'user'));
    }

    // Aboutページ
    public function about(){
        return view('about');
    }

    // Contactページ GET
    public function contact(){
        return view('contact');
    }

    // Contactページ POST
    public function contactPost(){

    }
}
