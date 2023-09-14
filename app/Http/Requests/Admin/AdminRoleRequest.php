<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRoleRequest extends FormRequest
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
                    'role_name' => ['required', 'string', 'max:255', 'unique:roles,name'],
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    'role_name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $this->role->id],
                ];
                break;
        }
    }
}
