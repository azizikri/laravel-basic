<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $validation = [
            'title' => ['required', 'max:255'],
            'content' => ['required'],
        ];

        if($this->isMethod('post')){
            $validation['thumbnail'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
        }

        if(!$this->isMethod('post')){
            $validation['thumbnail'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
        }

        return $validation;

    }
}
