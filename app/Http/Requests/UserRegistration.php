<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistration extends FormRequest
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
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'contact' => 'required|min:8|unique:users',
            'address' => 'required|min:5|regex:/(.*[,]){3}/u'
        ];
    }
    public function messages()
    {
        return [
            'address.required' => 'Address filed is required',
            'address.min' => 'Address name must be min 5 character',
            'address.regex' => 'Please Enter proper address. Ex: (Address, City, State, Country)'
        ];
    }
}
