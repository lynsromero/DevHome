<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class JoinRequest extends FormRequest
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
            'link' => 'required|url',
            'name' => 'required',
        ];
    }

    public function messages(): array
    {   
        return [
            'link.required' => 'Link is required',
            'link.url' => 'Link is invalid',
            'name.required' => 'Name is required',
        ];
    }
}
