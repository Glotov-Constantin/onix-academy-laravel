<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique',
            'password' => [
                'string',
                'min:6',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
            'password_confirmation' => 'same:password'
        ];
    }

    /**
     * @param \Illuminate\Validation\Validator $validator
     * @return mixed
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add('name', 'The field "name" must be not empty');
                $validator->errors()->add('email', 'The field "email" must be not empty');
                $validator->errors()->add('password', 'The field "password" must include minimum 6 characters, lowercase and uppercase letters, minimun 1 number');
                $validator->errors()->add('password_confirmation', 'The fiels must be same as "password"');
            }
        });
//        return $validator;
    }
}
