<?php
namespace App\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Application\Commands\LoginUser;

class LoginUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'    => ['required','email'],
            'password' => ['required','string'],
        ];
    }

    public function toCommand(): LoginUser
    {
        return new LoginUser(
            email: $this->email,
            password: $this->password
        );
    }
}
