<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class EditUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'alpha_num', 'min:2', 'max:20'],
            'username' => ['nullable', 'alpha_num', 'min:5', 'max:50'],
            'email' => ['nullable', 'string', 'min:2', 'max:255'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'pfp' => ['image', 'nullable']
        ];
    }
}
