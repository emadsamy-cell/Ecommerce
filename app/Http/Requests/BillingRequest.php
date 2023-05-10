<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fname' => 'required|string|max:20',
            'lname' => 'required|string|max:20',
            'country' => 'required',
            'main_address' => 'required|string|max:255',
            'city' => 'required|string|max:50',
            'state' => 'required|string|max:50',
            'postcode' => 'required|numeric',
            'email' => 'required|email',
            'phone' =>'required|numeric|digits:11'
        ];
    }
}
