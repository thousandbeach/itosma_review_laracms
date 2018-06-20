<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    //public function __construct(){
    //    $this->middleware('auth'); // ログインしてないときに管理パネル（/user/comments等）にアクセスしたときに、エラーになっていたのを、loginページが表示されるようにした。
    //}

    // Contactページ GET
    public function contact(){
        return view('contact');
    }

    // Contactページ POST
    public function contactPost(Request $request){
        $message = new Message;

        $this->vallidate($request, [
            'name' => 'string|required|between:2,180',
            'email' => 'string|required|email|max:180',
            'message' => 'string|required|between:5,2000',
        ]);

        $message->name = $request['name'];
        $message->email = $request['email'];
        $message->message = $request['message'];

        $message->save();

        return redirect()->back()->with('success', 'お問合わせありがとうございます！ 48時間以内にご返信させていただきます。');

    }

}
