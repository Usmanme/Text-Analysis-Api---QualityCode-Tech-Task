<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TextAnalysisRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'text' => 'required|string|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'text.required' => 'The text field is required.',
            'text.string' => 'The text must be a string.',
            'text.min' => 'The text must have at least 1 character.',
        ];
    }
}
