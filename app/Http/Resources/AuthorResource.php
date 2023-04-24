<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    public function toArray($request): array
    {
        return $this->resource->only('id', 'name', 'has_rocket_launcher', 'created_at');
    }
}
