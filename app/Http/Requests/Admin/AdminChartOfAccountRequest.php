<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminChartOfAccountRequest extends FormRequest
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
                    'code' => ['required', 'string', 'max:255', 'unique:chart_of_accounts,code'],
                    'name' => ['required', 'string', 'max:255'],
                    'parent' => ['required'],
                    'beginning_balance' => ['required'],
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    'code' => ['required', 'string', 'max:255', 'unique:chart_of_accounts,code,' . $this->coa->id],
                    'name' => ['required', 'string', 'max:255'],
                    'parent' => ['required'],
                    'beginning_balance' => ['required'],
                ];
                break;
        }
    }
}
