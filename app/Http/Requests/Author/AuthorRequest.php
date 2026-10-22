<?php

namespace App\Http\Requests\Author;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name',
            'name.min' => 'Enter 3 minimum characters',
            'name.max' => 'Maximum character for name is 50',
        ];
    }
}
