<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationDetailRequest extends FormRequest
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
            // 'image_file' => 'required',
            'donation' => 'required',
            'donation_type' => 'required',
            // 'preference_gender' =>'required',
            // 'preference_age' =>'required',
            'condition' =>'required',
            'title' =>'required|regex:/[a-zA-Z0-9 ]/',
            // 'description' => 'required',
            'city' => 'required|min:15|regex:/[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}/',
            
            'name' =>'nullable',
            'email' => 'nullable|email',
            'mobile_no' => 'nullable|min:10|max:10',
            'address' => 'nullable|min:15|regex:/[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}/',
            
            'helper_email' => 'nullable|email',
            'helper_mobile_no' => 'nullable|min:10|max:10',
            'helper_address'=> 'nullable|min:15|regex:/[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}/'
            //'is_urgent'=>'required'
            //'consideration'=>'required'
            // // 'image_file' => 'required',
            // 'donation' => 'required',
            // 'donation_type' => 'required',
            // // 'preference_gender' =>'required',
            // // 'preference_age' =>'required',
            // 'condition' =>'required',
            // 'title' =>'required|min:5|max:50|regex:[A-Za-z1-9]',
            // 'description' => 'required|min:15|max:255|regex:[A-Za-z1-9]',
            // 'city' => 'required|min:5|max:255|regex:/(.*[,]){3}/u',
            
            // 'name' =>'required|min:3|max:50|regex:[A-Za-z1-9]',
            // 'email' => 'nullable|email',
            // 'mobile_no' => 'required|min:9|regex:[1-9]',
            // 'address' => 'required|min:5|max:255|regex:/(.*[,]){3}/u',
            
            // 'helper_email' => 'nullable|email',
            // 'helper_mobile_no' => 'nullable|min:9|regex:[1-9]',
            // 'helper_address'=> 'nullable|min:5|max:255|regex:/(.*[,]){3}/u'
            
        ];
    }
    public function messages()
    {
        return [
            'city.required' => 'Filed is required',
            'city.min' => 'It should have proper Location, City, State, Country.',
            'city.regex' => 'It should have proper Location, City, State, Country.',
            
            'address.required' => 'Filed is required',
            'address.min' => 'It should have proper Location, City, State, Country.',
            'address.regex' => 'It should have proper Location, City, State, Country.',
            
            'helper_address.min' => 'It should have proper Location, City, State, Country.',
            'helper_address.regex' => 'It should have proper Location, City, State, Country.',
        ];
    }
}
