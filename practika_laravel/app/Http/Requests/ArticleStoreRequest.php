<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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

    /**tion rules that apply to the request.
     *
     * Get the valida
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:60',
            'content' => 'required',
            'picture' => 'max:4098',
            'author' => 'required|max:55',
            'category_id' => 'int',
        ];
    }
}
