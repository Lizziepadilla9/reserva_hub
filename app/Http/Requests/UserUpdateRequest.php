<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
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
            'company_name'=>'required|min:4|max:45',
            'representative'=>'required|max:120',
            'email'=>'required|max:220',
            'telephone'=>'required|max:9',
            'password'=>'min:8',

        
        
        ];
    }
}
