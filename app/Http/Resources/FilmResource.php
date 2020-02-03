<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            // 'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'rating' => $this->rating,
            'price' => $this->ticket_price,
            'date' => $this->release_date,
            'details' => $this->description,
            'country' => $this->country,
            'image' => $this->photo,
            'comments' => $this->comments,
            'genres' => $this->genres,
        ];
    }
}
