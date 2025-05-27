<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'title'        => $this->title,
            'poster_path'  => $this->poster_path,
            'is_published' => (bool) $this->is_published,
            'genres'       => GenreResource::collection($this->whenLoaded('genres')),
        ];
    }
}
