<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTempatIbadahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:100',
            'address' => 'sometimes|required|string',
            'details' => 'sometimes|required|string',
            'map_embed' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
