<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::facto    $genre = Genre::factory(10)->create();
//         $books = Book::factory(5)->create();
//            foreach ($books as $book) {
//                $genreId = $genre->random(5)->pluck('id');
//                $book->genre()->attach($genreId);
//                User::factory(2)->create();
//    }ry(2)->create();
//

        // \App\Models\User::factory(10)->create();
    }
}
