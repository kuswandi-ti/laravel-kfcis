<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminJasaSettingUpdateRequest extends FormRequest
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
            'jasa_pinjaman_reguler' => ['required', 'numeric'],
            'jasa_pinjaman_pendanaan' => ['required', 'numeric'],
            'jasa_pinjaman_sosial' => ['required', 'numeric'],
        ];
    }
}
