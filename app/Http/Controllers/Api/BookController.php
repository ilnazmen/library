<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookStoreRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Genre;
use http\Env\Response;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return BookResource::collection(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {
        $data = $request->validated();
        $genres = ($data['genre_id']);
        $genre = json_decode($genres[0]);
        unset($data['genre_id']);
        $data->addMediaFromRequest('image')->toMediaCollection();
        unset($data['image']);
        $added_book = Book::create($data);
        foreach ($genre as $item) {
            $added_book->genre()->attach($item);
        }
        return new BookResource($added_book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BookResource($book);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookStoreRequest $request, Book $book)
    {
        $data = $request->validated();
        if (!empty($data['genre_id'])) {
            $genre = json_decode($data['genre_id']);
            unset($data['genre_id']);
            $book->update($data);

            $book->genre()->sync($genre);

            return new BookResource($book);
        }

        $book->update($data);


        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {

        $book->delete();

        $book->genre()->detach();

        return response()->noContent();
    }
}
