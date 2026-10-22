<?php

namespace App\Http\Requests\Book;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:1', 'max:50'],
            'slug' => ['required', 'string', 'alpha_dash:ascii', Rule::unique('book', 'slug')],
            'isbn' => ['required', 'string'],
            'price' => ['required', 'decimal'],
            'description' => ['min:5', 'max:100'],
            'image' => ['mimes:jpg,jpeg,png', 'max:2048'],
            'author_id' => ['required', 'exist:authors,id', 'integer'],
            'publisher_id' => ['required', 'exists:publishers,id'],

        ];
    }
    // public function messages(): array
    // {
    //     return [
    //         'name.required' =>

    //     ];
    // }
}
