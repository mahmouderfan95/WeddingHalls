<?php

namespace App\Http\Requests\Admin\WeddingHall;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name' => 'required|string',
                    'image' => 'required|image|mimes:png,jpg|max:4000',
                    'price' => 'required',
                    'wedding_hall_category_id' => 'required|exists:wedding_hall_categories,id'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
//                    'id' => '',
                    'name' => 'required|string',
                    'image' => 'image|mimes:png,jpg|max:4000',
                    'price' => 'required',
                    'wedding_hall_category_id' => 'required|exists:wedding_hall_categories,id'
                ];
            }
            default: break;
        }
    }
}
