<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminPermissionRequest extends FormRequest
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
                    'permission_name' => ['required', 'string', 'max:255', 'unique:permissions,name'],
                    'group_name' => ['required', 'string', 'max:255'],
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    'permission_name' => ['required', 'string', 'max:255', 'unique:permissions,name,' . $this->permission->id],
                    'group_name' => ['required', 'string', 'max:255'],
                ];
                break;
        }
    }
}
