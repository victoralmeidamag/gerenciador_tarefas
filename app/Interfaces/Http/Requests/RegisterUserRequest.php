<?php

namespace App\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Application\Commands\RegisterUser;

class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => ['required','string','max:120'],
            'email'    => ['required','email','unique:users,email'],
            'password' => ['required','string','min:8','confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.email' => 'Email inválido',
        ];
    }

    public function toCommand(): RegisterUser
    {
        return new RegisterUser(
            name: $this->name,
            email: $this->email,
            password: $this->password
        );
    }
}
