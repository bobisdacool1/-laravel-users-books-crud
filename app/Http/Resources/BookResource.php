<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request): array
    {
        return $this->resource->only('id', 'name', 'copies_sold', 'created_at', 'published_at');
    }
}
