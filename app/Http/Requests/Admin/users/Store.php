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
                    'name' => 'required|string',
                    'email' => 'required|email',
                    'password' => 'required|min:8',
                    'type' => 'required|string'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
//                    'id' => '',
                    'name' => 'required|string',
                    'email' => 'required|email',
                ];
            }
            default: break;
        }
    }
}
