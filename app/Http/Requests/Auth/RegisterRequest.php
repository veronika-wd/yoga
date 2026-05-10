<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'password' => ['required', 'string', 'min:5'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Заполните имя",
            'name.max' => 'Максимально 255 символов',
            'phone.required' => 'Заполните номер телефона',
            'password.required' => 'Заполните пароль',
            'password.min' => 'Минимум 5 символов'
        ];
    }
}
