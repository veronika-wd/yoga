<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'price' => ['required', 'numeric', 'min:1'],
            'count' => ['required', 'integer', 'min:1'],
            'description' => 'nullable',
        ];
    }
}
