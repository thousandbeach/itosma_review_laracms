<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePost extends FormRequest
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
            // 記事投稿のバリデーションルールについて
            'title' => 'required|string|max:180',
            //'featured' => 'image|max:65536|dimensions:min_width=100,min_height=200,max_width=600,max_height=800',
            'featured' => 'image|max:650000',
            'category_id' => 'required|string',
            'content' => 'required|max:65000',
            'description' => 'required|string|max:180',
            'keyword' => 'required|string|max:180',
        ];
    }
}
