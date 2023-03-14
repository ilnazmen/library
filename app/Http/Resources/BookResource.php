<?php

namespace App\Http\Resources;

use App\Models\Book;
use App\Models\Status;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
          'id' => $this->id,
          'name' => $this->name,
          'author' => $this->author,
            'genre' => GenreResource::collection($this->genre),
            'status' => new StatusResource($this->status),
        ];
    }
}
