<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required',
            'body'=> 'required',
            'published_at' => 'nullable|date_format:d/m/Y',
            'excerpt' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ];
    }
}

