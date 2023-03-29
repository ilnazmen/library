<?php

namespace App\Http\Resources;

use App\Models\Book;
use App\Models\Status;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\MediaLibrary\MediaCollections\MediaCollection;

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
          'publisher' => $this->publisher,
          'description' => $this->description,
          'release_date' => $this->release_date,
            'image'  => $this->getFirstMediaUrl('image'),
            'genre' => $this->genre?->map(fn($value) => [
                'id'=>$value['id'],
                'title'=>$value['title']
            ]),
            'status' =>$this->status?->only(['id','title'])
//            'genre' => GenreResource::collection($this->genre),
//            'status' => new StatusResource($this->status),
        ];
    }
}
