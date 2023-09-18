<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'code' => ['required', 'string', 'max:255', 'unique:products,code'],
                    'name' => ['required', 'string', 'max:255'],
                    'specification' => ['required', 'string'],
                    'price_hpp' => ['required', 'numeric'],
                    'price_sell' => ['required', 'numeric'],
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    'code' => ['required', 'string', 'max:255', 'unique:products,code,' . $this->product->id],
                    'name' => ['required', 'string', 'max:255'],
                    'specification' => ['required', 'string'],
                    'price_hpp' => ['required', 'numeric'],
                    'price_sell' => ['required', 'numeric'],
                ];
                break;
        }
    }
}
