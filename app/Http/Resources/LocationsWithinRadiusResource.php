<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationsWithinRadiusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $result = [
        //     'name' => $this->name,
        //     'latitude' => floatval($this->latitude),
        //     'longitude' => floatval($this->longitude),
        // ];

        return parent::toArray($request);
    }
}
