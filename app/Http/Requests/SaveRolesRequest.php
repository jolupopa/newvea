<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRolesRequest extends FormRequest
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
        $rules = [
            'display_name' => 'required',
            'guard_name' => 'required'
        ]; 

        if( $this->method() !=='PUT')
        {
            $rules['name'] = 'required|unique:roles';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El identificador de rol es obligatorio',
            'name.unique' => 'Este identificador de rol ya existe',
            'display_name.required' => 'El nombre del rol es obligatorio',
            'guard_name.required' => 'Debe seleccionar un guard'
        ];
    }
}
