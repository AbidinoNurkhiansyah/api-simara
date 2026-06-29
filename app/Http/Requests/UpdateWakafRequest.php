<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWakafRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'           => 'required|string|max:255',
            'jenis_properti' => 'required|string|in:Tanah,Bangunan',
            'luas'           => 'required|string|max:100',
            'nadzir'         => 'required|string|max:255',
            'address'        => 'required|string',
            'map_embed'      => 'nullable|string',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
