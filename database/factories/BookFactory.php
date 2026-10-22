<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(3);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'isbn' => $this->faker->isbn13(),
            'price' => $this->faker->randomFloat(2, 10, 99),
            'description' => fake()->text(200),
            'image' => 'https://picsum.photos/seed/'.fake()->unique()->numberBetween(1, 10000).'/300/450',
            'author_id' => Author::factory(),
            'publisher_id' => Publisher::factory(),
        ];
    }
}
