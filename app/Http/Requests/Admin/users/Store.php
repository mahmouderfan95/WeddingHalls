<?php

namespace App\Http\Requests\Admin\users;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name' => 'required|string|min:8',
                    'email' => 'required|email|ends_with:.com',
                    'password' => 'required|min:8',
                    'address' => 'required|string|min:10|max:250',
                    'phone' => 'required|string',
                    'type' => 'required|string',
                    'national_id' => 'required|digits:14|numeric'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
//                    'id' => '',
                    'name' => 'required|string',
                    'email' => 'required|email',
                    // 'address' => 'required|string|min:10|max:250',
                    // 'phone' => 'required|string',
                    // 'type' => 'required|string',
                    // 'national_id' => 'required|digits:14|numeric'
                ];
            }
            default: break;
        }
    }
}
