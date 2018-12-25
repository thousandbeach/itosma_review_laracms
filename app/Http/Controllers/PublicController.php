<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // トップページ
    public function index(){
        // $posts = Post::all();
        $posts = Post::paginate(10);
        return view('welcome', compact('posts'));
    }

    // 投稿ページ
    public function singlePost(Post $post){
        return view('singlePost', compact('post'));
    }


    public function blogUsers(Post $post, Request $request){
        $posts = Post::all(); //ペジネーションだと動かない
        
        foreach ($posts as $post) {
            $postss = urldecode($post->user->name); // URLデコード 漢字や空白対策
            //if( strpos($request->url(), $postss)){
            $bUKeys = parse_url($request->url()); //パース処理
            $bUPath = explode("/", $bUKeys['path']); //分割処理
            $bULast = end($bUPath); //最後の要素を取得
            $bULastEn = urldecode($bULast); // 最後の要素をURLデコード 漢字や空白対策
            if($bULastEn === $postss){
                return view('blogUsers', compact('post','posts','request','postss'));
            }
        }
    }

    // Aboutページ
    public function about(){
        return view('about');
    }

    // PrivacyPolicyページ GET
    public function privacy(){
        return view('privacy');
    }
}
