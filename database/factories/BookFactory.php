<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'copies_sold' => $this->faker->randomNumber(),
            'published_at' => $this->faker->dateTime,
        ];
    }
}
