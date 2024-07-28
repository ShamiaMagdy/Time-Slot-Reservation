<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $username = $this->route('username');
        return [
            'firstname'=>'string|max:255',
            'lastname'=>'string|max:255',
            'username'=>'string|max:255|unique:users,username,'.$username .',username',
            'email'=>'string|email|max:255|unique:users,email,'.$username .',username',
            'password'=>'string|min:6',
            'phone'=>'string',
            'address'=>'string|max:255',
        ];
    }
}
