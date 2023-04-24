<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'author' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
