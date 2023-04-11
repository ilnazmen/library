<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookStoreRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;

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

        $order = Book::orderBy('created_at', 'desc')->with('media')->get();

         return BookResource::collection($order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {
        $book_data = $request->only([
            'name',
            'author',
            'publisher',
            'description',
            'release_date',
            'ImageUrl',
            'status_id',
        ]);
        $added_book = Book::create($book_data);
        $added_book->addMediaFromRequest('image')
            ->usingName($added_book->name)
            ->toMediaCollection('image');

        $genres = $request->get('genre_id') ?? [];

        foreach ($genres as $item) {
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
        $book_data = $request->only([
            'name',
            'author',
            'publisher',
            'description',
            'release_date',
            'ImageUrl',
            'status_id',
        ]);

        $book->update($book_data);


        if ($request->hasFile('image')) {
            $book->media()->delete();
            $book->addMediaFromRequest('image')
                ->usingName($book->name)
                ->toMediaCollection('image');
        }
//        $book->addMediaFromRequest('image')
//            ->usingName($book->name)
//            ->toMediaCollection('image');

        $genres = $request->get('genre_id') ?? [];
        foreach ($genres as $item) {
            $book->genre()->attach($item);
        }
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
