<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminDepartmentRequest extends FormRequest
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
        switch ($this->method())
        {
            case 'POST':
                return [
                    'name' => ['required', 'string', 'max:255', 'unique:departments,name'],
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    'name' => ['required', 'string', 'max:255', 'unique:departments,name,' . $this->department->id],
                ];
                break;
        }
    }
}
