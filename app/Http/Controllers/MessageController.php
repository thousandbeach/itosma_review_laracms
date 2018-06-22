<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
//use App\Http\Controllers\Schema;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class MessageController extends Controller
{
    //
    //public function __construct(){
    //    $this->middleware('auth'); // ログインしてないときに管理パネル（/user/comments等）にアクセスしたときに、エラーになっていたのを、loginページが表示されるようにした。
    //}

    // Contactページ GET
    public function contact(){
        //if (Schema::hasColumn('messages', 'message')) {
            return view('contact');
        //}
        //return view('contact');
    }

    // Contactページ POST
    public function contactPost(Request $request){
        $message = new Message;

        $this->validate($request, [
            'name' => 'string|required|between:2,180',
            'email' => 'string|required|email|max:180',
            'message' => 'string|required|between:5,2000',
        ]);

        $message->name = $request['name'];
        $message->email = $request['email'];
        $message->message = $request['message'];

        $message->save();

        return redirect()->back()->with('success', 'お問合わせいただきまして、誠にありがとうございます！ 48時間以内にご返信させていただきます。');

    }

}
