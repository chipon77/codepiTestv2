<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'author' => 'bail|required|alpha',
            'title' => 'bail|required|alpha',
            'price' => 'bail|required|numeric',
            'editor' => 'bail|required|alpha',
            'type' => 'bail|required|alpha',
            'category' => 'bail|array'
                ];
    }

}
