<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email:255|unique:users',
            'password' => 'required|min:6'
        ];
    }

    // Overwrite error messages
    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Don\'t forget your name',
    //     ];
    // }
}
