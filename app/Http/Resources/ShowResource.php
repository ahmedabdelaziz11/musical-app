<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ID' => $this->id,
            'Title' => $this->title,
            'Date' => $this->date,
            'Artist' => new ArtistResource($this->whenLoaded('artist')),
            'VSSSSenue' => new VenueResource($this->whenLoaded('venue')),
        ];
    }
}
