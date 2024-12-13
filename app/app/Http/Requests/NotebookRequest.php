<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotebookRequest extends FormRequest
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
    public function rules()//: array
    {
    $rules = [
        'full_name' => 'required|string|max:255',
        'company' => 'nullable|string|max:255',
        'phone' => 'required|string',
        'email' => 'required|string|email|max:255',
        'birth_date' => 'nullable|date|date_format:Y-m-d',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ];

    if ($this->isMethod('post')) {
        $rules['email'] .= '|unique:notebooks,email';
    }

    return $rules;
    }
}

