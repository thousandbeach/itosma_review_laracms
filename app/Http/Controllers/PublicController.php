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

    // 投稿ページ（名前ごとに一覧表示させるページ）
    /*public function singlePostAuthor(Post $posts){
        //$posts = Post::all();
        //return view('singlePostAuthor', compact('posts'));
        return view('singlePostAuthor');
    }*/

    /*public function singlePostAuthor(Post $post){
        $singlePostAuthor = DB::table('posts')->where('name', '==', Auth::user()->id())->get();
        return view('singlePostAuthor', compact('singlePostAuthor'));
    }*/

    public function blogUsers(Post $post, Request $request){
        //$user_posts = Post::where('user_id', $user_id)->get();
        //$users = Post::all()->find($post->user_id);
        /*$ppppp = singlePost(Post, $post);
        $pppp = $posts->user->name;
        if($ppppp == $pppp){
            return view('singlePostAuthor', compact('pppp'));
        }*/
        $posts = Post::all(); //ペジネーションだと動かない
        /*foreach ($posts as $post) {
            return view('singlePostAuthor', compact('post'));
        }*/
        //dd(view('blogUsers', compact('post','posts')));
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

    // Contactページ GET
    public function contact(){
        return view('contact');
    }

    // Contactページ POST
    public function contactPost(){

    }
}
