<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateAdministratorRequest extends FormRequest
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
            'name' => 'required',
            'email' => [
                'required', 
                Rule::unique('administrators')->ignore($this->route('administrator')->id)],
            ];

        if($this->filled('password'))
        {
            $rules['password'] = [ 'required_with:password_confirmation','confirmed', 'min:8'];
           
        }
        return $rules;

    }

    
}
