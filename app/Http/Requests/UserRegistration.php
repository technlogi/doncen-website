<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \App\Models\User;
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
            'name' => 'nullable|min:3|max:50|regex:/(^[A-Za-z0-9 ]+$)+/',
            'contact' => 'required|min:10|max:10|digits:10',
            
 	       'password' => 'min:4|max:4|digits:4',
           'password_confirmation' => 'min:4|max:4|digits:4|same:password',
            
            'email' => 'nullable|email|max:255|unique:users',
            'address' => 'nullable|min:15|regex:/[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}/'
        ];
    }
    public function messages()
    {
        return [
            'address.required' => 'Location filed is required',
            'address.min' => 'It should have proper Location, City, State, Country.',
            'address.regex' => 'It should have proper Location, City, State, Country.'
        ];
    }
}
