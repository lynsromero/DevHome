<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'        => 'required|string|max:255',
            'slug'         => 'required|string|max:255|unique:projects,slug',
            'description'  => 'required|string',

            'thumbnail'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'github_url'   => 'nullable|url|max:255',
            'live_url'     => 'nullable|url|max:255',

            'tech_stack'   => 'nullable|array',
            'tech_stack.*' => 'string|max:50',
        ];
    }
}
