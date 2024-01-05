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
            'user_name' => 'required|min:3|max:50|regex:/(^[A-Za-z0-9 ]+$)+/',
            
            'email' => 'nullable|email|max:255',
            'city' => 'nullable|min:15|regex:/[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}/'
        ];
    }
    public function messages()
    {
        return [
            'city.required' => 'Field is required',
            'city.min' => 'It should have proper Location, City, State, Country.',
            'city.regex' => 'It should have proper Location, City, State, Country.'
        ];
    }
}
