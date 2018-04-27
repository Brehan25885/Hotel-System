<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateManagerRequest extends FormRequest
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
            'national_id'=>'unique:managers,national_id,' .$this->managers,
              'email'=>'unique:managers,email,' .$this->managers,    
                'avatar_image' => 'mimes:jpg,jpeg' , 
        ];
    }
}
