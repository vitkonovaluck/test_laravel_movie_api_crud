<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'is_published' => 'boolean',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ];
    }
}
