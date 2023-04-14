<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_date' => $this->order_date,
            'booking_date' => $this->booking_date,
            'return_date' => $this->return_date,
            'book_id' => $this->book,
            'status' => $this->book->status?->only(['id','title']),
            'user_id'  => $this->user,
            'image'  => $this->book->getFirstMediaUrl('image'),
        ];
    }
}
