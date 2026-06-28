<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTempatIbadahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // You can add actual authorization logic later
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'address' => 'required|string',
            'details' => 'required|string',
            'map_embed' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
