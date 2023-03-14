<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(20),
            'author' =>$this->faker->name(10),
            'publisher' =>$this->faker->name(7),
            'description' =>$this->faker->text(20),
            'release_date'=>$this->faker->date(),
            'ImageUrl'=>$this->faker->imageUrl(20),
            'statuses_id'=> Status::get()->random()->id,

        ];
    }
}
