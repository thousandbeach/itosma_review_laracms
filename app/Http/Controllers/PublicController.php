<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    // トップページ
    public function index(){
        return view('welcome');
    }

    // 投稿ページ
    public function singlePost($id){
        return view('singlePost');
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
