<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPetRequest extends FormRequest
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
                'name' => ['required', 'min:1'],
                'type' => 'required|in:dog,cat,bird,ferret,rodent,insects/bugs,reptiles,fish,farm,other',
                'petpic' => [ 'nullable', 'image'],
                'birthdate' => ['nullable', 'date', 'before:today'],
                'deathhdate' => ['nullable', 'date', 'before:today'],
        ];
    }
}
