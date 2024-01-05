<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBiodataDetailRequest extends FormRequest
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
            // 'image_file'             => 'required',
            'firstname'                 => 'required',
            'middlename'                => 'required',
            'lastname'                  =>'required',
            'gender'                    =>'required',
            'father_firstname'          =>'required',
            'father_middlename'         =>'required',
            'father_lastname'           => 'required',
            'dob'                       => 'required', //'min:5|regex:/(.*[,]){3}/u',
            'placeofbirth'              =>'required',
            'placeofbirthdist'          => 'required',
            'description'               => 'required',
            'mother_tounge'             => 'required',
            'height'                    => 'required',
            'weight'                    => 'required',
            'skin_color'                => 'required',
            'marital_status'            => 'required',
            'location'                  => 'required|min:5|regex:/(.*[,]){3}/u',
            'edu_quali'                 => 'required',
            'profession'                => 'required',
            'candi_post'                => 'required',
            'candi_income'              => 'required',
            'ofc_address'               => 'required',
            'father_business'           => 'required',
            'candi_father_income'       => 'required',
            'mother_name'               => 'required',
            'candi_mother_business'     => 'required',
            'living_type'               => 'required',
            'house_type'                => 'required',
            'number_of_brother'         => 'required',
            'number_of_sister'          => 'required',
            'bro_marital_status'        => 'required',
            'sis_marital_status'        => 'required',
            'metrnal_uncle_lname'       => 'required',
            'number_of_metarnal_uncles' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'location.required' => 'City filed is required',
            'location.min' => 'City name must be min 5 character',
            'location.regex' => 'Please Enter proper address. Ex: (Location, City, State, Country)',
            // 'address.required' => 'City filed is required',
            // 'address.min' => 'City name must be min 5 character',
            // 'address.regex' => 'Please Enter proper address. Ex: (Location, City, State, Country)',
            // 'helper_address.min' => 'City name must be min 5 character',
            // 'helper_address.regex' => 'Please Enter proper address. Ex: (Location, City, State, Country)',
        ];
    }
}
