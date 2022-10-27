<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'recipe_name' => fake()->name(),
            'slug' => $this->faker->slug(),
            'about' => $this->faker->slug(),
            'portion' => mt_rand(1, 4),
            'time' => mt_rand(1, 100),
            'user_id' => mt_rand(1, 2),
            'country_id' => mt_rand(1, 2),
            'category_id' => mt_rand(1, 2),
            'steps' => $this->faker->paragraph(20),
            'ingredients' => mt_rand(1, 10),
        ];
    }
}

// collect($this->faker->paragraphs(mt_rand(5, 10)))->map(
//                 fn ($p) => "<p>$p</p>"
//             )->implode(''),