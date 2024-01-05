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
            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
 	       'password' => 'min:4|max:4|digits:4',
           'password_confirmation' => 'min:4|max:4|digits:4|same:password',
         //   'contact' => 'required|min:8|unique:users',
            'contact' => 'required|min:10|max:10|digits:10',
            'address' => 'required|min:5|regex:/(.*[,]){3}/u'
        ];
    }
    public function messages()
    {
        return [
            'address.required' => 'Address filed is required',
            'address.min' => 'Address name must be min 5 character',
            'address.regex' => 'Please Enter proper address. Ex: (Location, City, State, Country)'
        ];
    }
}
