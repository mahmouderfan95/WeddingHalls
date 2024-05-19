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
            'name' => 'required|string|min:8|max:155',
            'email' => 'required|email|unique:users,email|ends_with:.com',
            'password' => 'required|string|min:8',
            'phone' => 'required|max:11',
            'address' => 'required|string',
            'national_id' => 'required|digits:14'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 155 characters.',
            'name.min' => 'The name must be at least 8 characters long.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters long.',
            'phone.required' => 'The phone field is required.',
            'phone.max' => 'The phone may not be greater than 11.',
            'address.required' => 'The address field is required.',
            'national_id.required' => 'The national_id field is required.',
            'national_id.digits' => 'The phone number must be exactly :digits digits.'

        ];
    }
}
