<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' =>'required|max:255',
            'author'=>'',
            'publisher' =>'',
            'description'=>'',
            'release_date' =>'required',
            'ImageUrl'=>'',
            'status_id'=>'',
            'genre_id'=>'',
        ];
    }
}
