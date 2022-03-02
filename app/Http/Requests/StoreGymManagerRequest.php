<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGymManagerRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:4'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'national_id' => ['required', 'min:14', 'max:14','unique:users']
        ];

    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()      // if you want to override the error message
    {
        return [
            'natioal_id.min' => 'national ID must be 14 digits',
            'natioal_id.max' => 'national ID must be 14 digits',
        ];
    }

}
