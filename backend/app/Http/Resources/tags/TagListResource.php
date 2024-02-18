<?php

namespace App\Http\Resources\tags;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagListResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'color' => $this->resource->color,
            'description' => $this->resource->description,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at
        ];
    }
}
