<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeddingHallResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'image' => $this->image != null ? asset('uploads/weddingHalls/' . $this->image) : null,
            'wedding_hall_category_id' => $this->relationLoaded('weddingHallCategory') ? $this->weddingHallCategory->name : null,
            'location' => $this->location
        ];
    }
}
