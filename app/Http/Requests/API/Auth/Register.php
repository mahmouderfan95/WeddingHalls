<?php

namespace App\Http\Requests\API\Auth;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'name' => 'required|string|min:8',
            'email' => 'required|email|unique:users,email|ends_with:.com',
            'password' => 'required|string|min:8',
            'phone' => 'required|max:11',
            'address' => 'required|string',
            'national_id' => 'required|digits:14'
        ];
    }
}
