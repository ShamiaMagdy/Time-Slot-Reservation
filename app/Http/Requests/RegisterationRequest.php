<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterationRequest extends FormRequest
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
            'firstname'=>'required|string|max:255',
            'lastname'=>'required|string|max:255',
            'username'=>'required|string|max:255|unique:users,username',
            'email'=>'required|string|email|max:255|unique:users,email',
            'password'=>'required|string|min:6',
            'phone'=>'required|string',
            'address'=>'required|string|max:255',
        ];
    }
}
