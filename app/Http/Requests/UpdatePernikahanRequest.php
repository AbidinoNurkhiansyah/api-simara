<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePernikahanRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bulan' => 'sometimes|string|max:20',
            'tahun' => 'sometimes|integer',
            'pernikahan' => 'sometimes|integer|min:0',
            'isbat_nikah' => 'sometimes|integer|min:0',
        ];
    }
}
