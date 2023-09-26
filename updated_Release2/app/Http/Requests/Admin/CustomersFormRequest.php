<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CustomersFormRequest extends FormRequest
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
            'customer_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'required',
                'string',
                'max:200'
            ],
            'username' => [
                'required',
                'string',
                'max:200'
            ],
            'age' => [
                'required',
                'integer',
            ],
            'gender' => [
                'required',
                'string',
                'max:200'
            ],
            'birth_date' => [
                'required',
                'string',
                'max:200'
            ],
            'marital_status' => [
                'required',
                'string',
                'max:200'
            ],
            'phone' => [
                'required',
                'string',
                'max:200'
            ],
            'email' => [
                'required',
                'string',
                'max:200'
            ],
            'address' => [
                'required',
                'string',
                'max:200'
            ],
            'password' => [
                'required',
                'string',
                'max:200'
            ],
            'policy_number' => [
                'required',
                'integer',
            ],
            'policy_type' => [
                'required',
                'string',
                'max:200'
            ],
            'plans' => [
                'required',
                'string',
                'max:200'
            ],
            'description' => [
                'required',
                'string',
                'max:600'
            ],
        ];
        return $rules;
    }
}
