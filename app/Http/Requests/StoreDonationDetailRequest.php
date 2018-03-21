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
            'image_file' => 'required',
            'donation' => 'required',
            'donation_type' => 'required',
            'preference_gender' =>'required',
            'preference_age' =>'required',
            'condition' =>'required',
            'title' =>'required',
            'description' => 'required',
            'city' => 'required',
            'name' =>'required',
            'email' => 'required|email',
            'mobile_no' => 'required|min:9',
            'address' => 'required|min:5',
            'helper_email' => 'nullable|email',
            'helper_mobile_no' => 'nullable|min:8',
            'helper_address'=> 'nullable|min:5'
        ];
    }
}
