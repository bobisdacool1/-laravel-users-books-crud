<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookBaseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string', 'min:3', 'max:32'],
            'copies_sold' => ['int', 'gte:0'],
            'published_at' => ['date', 'nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
