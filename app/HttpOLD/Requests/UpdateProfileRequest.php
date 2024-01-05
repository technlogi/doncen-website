<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'user_name' => 'required|min:3',
            'email' => 'required|email',
            'city' => 'required|min:5|regex:/(.*[,]){3}/u'
        ];
    }
    public function messages()
    {
        return [
            'city.required' => 'City filed is required',
            'city.min' => 'City name must be min 5 character',
            'city.regex' => 'Please Enter proper address. Ex: (Address, City, State, Country)'
        ];
    }
}
