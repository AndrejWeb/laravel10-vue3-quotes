<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuoteRequest extends FormRequest
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
            'text' => ['required', 'min:10', 'max: 500', Rule::unique('quotes')->ignore($this->quote)],
            'author' => ['sometimes', 'min:3', 'max:50'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'text.required' => 'The quote field is required.',
            'text.min' => 'The quote field must be at least 10 characters.',
            'text.max' => 'The quote field must be maximum 500 characters.',
            'text.unique' => 'The quote already exists.',
        ];
    }
}
