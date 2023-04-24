<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseAuthorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string', 'min:3', 'max:32'],
            'has_rocket_launcher' => ['bool'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
