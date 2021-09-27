<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PofficeRequest extends FormRequest
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
            'name' => 'required|string|min:1',
            'email' => 'required|email:rfc,dns',
            'postcode' => 'required|integer|min:1',
            'address' => 'required|string|min:1',
            'phoneNumber' => 'required|integer|min:1',
        ];
    }
}