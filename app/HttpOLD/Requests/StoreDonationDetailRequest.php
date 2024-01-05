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
            'title' =>'required',
            'description' => 'required',
            'city' => 'required|min:5|regex:/(.*[,]){3}/u',
            'name' =>'required',
            'email' => 'nullable|email',
            'mobile_no' => 'required|min:9',
            'address' => 'required|min:5|regex:/(.*[,]){3}/u',
            'helper_email' => 'nullable|email',
            'helper_mobile_no' => 'nullable|min:8',
            'helper_address'=> 'nullable|min:5|regex:/(.*[,]){3}/u'
        ];
    }
    public function messages()
    {
        return [
            'city.required' => 'City filed is required',
            'city.min' => 'City name must be min 5 character',
            'city.regex' => 'Please Enter proper address. Ex: (Location, City, State, Country)',
            'address.required' => 'City filed is required',
            'address.min' => 'City name must be min 5 character',
            'address.regex' => 'Please Enter proper address. Ex: (Location, City, State, Country)',
            'helper_address.min' => 'City name must be min 5 character',
            'helper_address.regex' => 'Please Enter proper address. Ex: (Location, City, State, Country)',
        ];
    }
}
