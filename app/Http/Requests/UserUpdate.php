<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator; // 昨晩ついk
use Illuminate\Foundation\Auth\RegistersUsers; // 昨晩追加

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
        return [
            //バリデーションルール
            'name' => 'required|string|max:180',
            'email' => 'required|string|email|max:180', //|unique:users', これは必要ないかも
        ];
    }
}
