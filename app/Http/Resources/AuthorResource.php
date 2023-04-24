<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            ...$this->resource->only('id', 'name', 'created_at'),
            'has_rocket_launcher' => (bool)$this->has_rocket_launcher,
            'books_count' => $this->books()->count(),
        ];
    }
}
