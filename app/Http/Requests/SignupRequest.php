<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// Not use
class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'bail|required|alpha|min:3|max:20',
            'fullname' => 'bail|required|alpha|min:10|max:100',
        ];
    }
    
    public function messages()
    {
        return [
            'username.required' => 'Username không được để trống',
            'username.min' => 'Username ít nhất 3 ký tự!',
            'username.max' => 'Username nhiều nhất 20 ký tự!',

            'fullname.required' => 'Fullname không được để trống',
            'fullname.min' => 'Fullname ít nhất 3 ký tự!',
            'fullname.max' => 'Fullname nhiều nhất 100 ký tự!',

        ];
    }
}
