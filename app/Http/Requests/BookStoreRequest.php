<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'description' => 'required|string',
            'release_date' => 'required|string',
            'ImageUrl' => 'nullable|string',
            'image' => 'required|file|image',
            'status_id' => 'required|numeric',
            'genre_id' => 'required|array',
        ];
    }
}
