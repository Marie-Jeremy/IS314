<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClaimFormRequest extends FormRequest
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
            'string',
            'max:200'
        ],
        'name' => [
            'required',
            'string',
            'max:200'
        ],
        'email' => [
            'required',
            'string',
            'max:200'
        ],
        'claim_type' => [
            'required',
            'string',
            'max:200'
        ],
        'description' => [
            'required',
            'string',
            'max:500'
        ],
        'proof_of_loss' => [
            'required',
            'file',
            'mimes:jpeg,png,pfd,txt'
        ]
    ];
    return $rules;
}
    }

