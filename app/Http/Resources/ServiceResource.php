<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'             => $this->name,
            'slug'             => $this->slug,
            'description'      => $this->description,
            'price'            => $this->price,
            'compare_price'    => $this->compare_price,
            'note'             => $this->note,
            'images'           => $this->images,
            'icon'             => $this->icon,
        ];
    }
}
