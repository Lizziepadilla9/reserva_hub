<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;



class UserCreateRequest extends Request
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
            'company_name'=>'required|unique:companies,name|min:4|max:45',
            'representative'=>'required|max:120',
            'email'=>'required|unique:companies,email|email|max:220',
            'telephone'=>'required|max:9',

        ];
    }

    public function attributes()
    {
        return [
            'company_name'=>'Nombre de la compañia',
            'representative'=>'Representante',
            'email'=>'Correo',
            'telephone'=>'Telefono',

        ];
    }
    
}
