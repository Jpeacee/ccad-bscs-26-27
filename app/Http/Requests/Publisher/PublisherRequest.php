<?php

namespace App\Http\Requests\Publisher;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        $name = $this->input('publisher_name');

        if(is_string($name)){
            $this->merge([
                'publisher_name' => preg_replace(
                    '/\s+/u',' ',trim($name)
                )
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'publisher_name' => ['required', 'string', 'min:3', 'max:50','unique:publishers,publisher_name'],
        ];
    }

    public function messages(): array
    {
        return [
            'publisher_name.required' => 'Publisher name is required.',
            'publisher_name.string' => 'Publisher name must be a string.',
            'publisher_name.min' => 'Publisher name must be at least :min characters.',
            'publisher_name.max' => 'Publisher name must not exceed :max characters.',
            'publisher_name.unique' => 'Publisher name must be unique.',
        ];
    }


}
