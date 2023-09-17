<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminMemberUserRequest extends FormRequest
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
                    'nik' => ['required', 'string', 'max:255'],
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'max:255', 'unique:users,email'],
                    'employee_group' => ['required', 'string', 'max:255'],
                    'join_date' => ['required', 'date'],
                    'start_work_date' => ['required', 'date'],
                    'department' => ['required'],
                    'section' => ['required'],
                    'account_number' => ['required', 'string', 'max:255'],
                    'account_name' => ['required', 'string', 'max:255'],
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    'nik' => ['required', 'string', 'max:255'],
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'max:255', 'unique:users,email,' . $this->member->id],
                    'employee_group' => ['required', 'string', 'max:255'],
                    'join_date' => ['required', 'date'],
                    'start_work_date' => ['required', 'date'],
                    'department' => ['required'],
                    'section' => ['required'],
                    'account_number' => ['required', 'string', 'max:255'],
                    'account_name' => ['required', 'string', 'max:255'],
                ];
                break;
        }
    }
}
