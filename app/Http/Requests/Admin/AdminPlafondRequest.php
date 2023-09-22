<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminPlafondRequest extends FormRequest
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
                    'level' => ['required', 'numeric', 'unique:plafonds,level'],
                    'warranty' => ['required', 'numeric'],
                    'asset' => ['required', 'numeric'],
                    'index' => ['required', 'numeric'],
                    'max_loan' => ['required', 'numeric'],
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    'level' => ['required', 'numeric', 'unique:plafonds,level,' . $this->plafond->id],
                    'warranty' => ['required', 'numeric'],
                    'asset' => ['required', 'numeric'],
                    'index' => ['required', 'numeric'],
                    'max_loan' => ['required', 'numeric'],
                ];
                break;
        }
    }
}
