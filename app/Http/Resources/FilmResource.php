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
        return [
        	'id' => $this->id,
			'name' => $this->name,
			'slug' => $this->slug,
			'description' => $this->description,
			'release_date' => $this->release_date,
			'ticket_price' => $this->ticket_price,
			'rating' => $this->rating,
			'country' => $this->country,
			'photo' => $this->photo,
			'genres' => GenreResource::collection($this->whenLoaded('genres')),
			'comments' => CommentResource::collection($this->whenLoaded('comments'))
		];
    }
}
