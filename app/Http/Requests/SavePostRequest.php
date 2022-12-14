<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
////        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:150',
//            'keywords' =>'',
            'text' => 'required|min:10',
            'user_id' => 'required'
//            'email' => 'required|unique:posts|max:255',
//            'cover' => 'mimes:png,jpeg,gif'
        ];
    }
//    public function withValidator($validator)
//    {
//        return $validator;
//    }
}
