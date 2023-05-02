<?php

namespace App\Http\Requests;

use App\Models\product;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' =>['required','unique:'.product::class],
            'price' => 'required|decimal:0,2',
            'image' => 'required|image',
            'discription' => 'required',
            'discount' =>'required|numeric|between:0,100',
            'avaliable' =>'required|min:1',
            'category' =>'required',
        ];
    }
}
