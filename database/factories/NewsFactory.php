<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'preview' => $this->faker->paragraph,
            'body' => $this->faker->text(1000),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
