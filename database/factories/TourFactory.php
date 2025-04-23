<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
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
            'slug' => $this->faker->slug(),
            'images' => [
                $this->faker->imageUrl(),
                $this->faker->imageUrl(),
                $this->faker->imageUrl(),
            ],
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(1000, 10000),
            'compare_price' => $this->faker->numberBetween(1000, 10000),
            'note' => $this->faker->text(),
            'category_id' => Category::all()->random()->id,
        ];
    }
}
