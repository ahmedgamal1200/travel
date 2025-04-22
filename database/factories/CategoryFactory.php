<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'item' => $this->faker->numberBetween(1, 30),
            'image' => $this->faker->imageUrl(),
            'slug' => $this->faker->slug(),
            'category_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
