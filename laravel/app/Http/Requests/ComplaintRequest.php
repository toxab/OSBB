<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ComplaintRequest
 * @package App\Http\Requests
 */
class ComplaintRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:150',
            'text_problem' => 'required|max:3000',
            'client_id' => ['exists:App\Models\ClientApp,id'],
            'in_work' =>'boolean',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Type is required!',
            'text_problem.required' => 'Grade is required!',
            'client_id' => 'client not found',
            'in_work' => 'in_work is type of boolean'
        ];
    }
}
