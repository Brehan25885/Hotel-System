<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeReceRequest extends FormRequest
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
            'password' =>'min:6',
             'national_id'=>'unique:receptionists',
           'email'=>'unique:receptionists',     
            'avatar_image' => 'mimes:jpg,jpeg' ,
            
          
        ];
    }
}
