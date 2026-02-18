<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDevRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'designation' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:users,slug',
            'facebook_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'experience' => 'nullable|string',
            'languages' => 'nullable|array',
            'password' => 'required|string|min:8',
        ];
    }
}
