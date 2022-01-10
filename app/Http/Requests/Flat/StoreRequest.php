<?php

namespace App\Http\Requests\Flat;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'billing_number' => 'required',
            'house_id' => 'required|numeric|exists:houses,id',
            'number' => 'required|numeric',
            'full_name' => 'required',
            'phone' => 'required',
            'members_count' => 'required|numeric',
            'area' => 'required|numeric'
        ];
    }
}
