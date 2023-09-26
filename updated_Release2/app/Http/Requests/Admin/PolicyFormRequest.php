<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PolicyFormRequest extends FormRequest
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
        // Calculate premium amount based on coverage amount
        $premium = $this->input('coverage_amount') * 0.1;

        $rules = [
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
            'coverage_amount' => [
                'required',
                'string',
                'max:200'
            ],
            'premium_amount' => [
                'required',
                'string',
                'max:200',
                // Custom validation rule to set the premium amount
                function ($attribute, $value, $fail) use ($premium) {
                    if ($value != $premium) {
                        $fail('The premium amount must be ' . $premium);
                    }
                }
            ],
            'policy_duration' => [
                'required',
                'string',
                'max:200'
            ],
          
        ];
        return $rules;
    }
}
