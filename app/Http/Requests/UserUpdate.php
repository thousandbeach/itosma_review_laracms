<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//use Illuminate\Support\Facades\Validator; // 昨晩ついk
// use Illuminate\Foundation\Auth\RegistersUsers; // 昨晩追加
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
//use App\User;

class UserUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user_id = Auth::user()->id;
        return [
            //バリデーションルール
            'name' => 'required|string|max:180',
            'email' => 'required|string|email|max:180',
            'password' => 'required',
            'newpassword' => 'required|string|min:6|confirmed',
            'newpassword_confirmation' => 'required|string|min:6|same:newpassword',
            'email' => Rule::unique('users')->ignore($user_id), // emailにuniqueチェックを施し、且つ、更新時に自身は除く設定
        ];
    }



}
