<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'teacher' => ['required', Rule::exists('teachers', 'id')],
            'price' => ['required', 'numeric'],
            'datetime' => ['required', 'date'],
            'time' => ['required'],
            'image' => ['image' , 'mimes:jpeg,png,jpg,gif,svg'],
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => 'Доступные типы файлов: jpeg, png, jpg, gif, svg',
        ];
    }
}
