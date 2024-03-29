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
            'about' => $this->faker->paragraph(10),
            'portion' => mt_rand(1, 4),
            'time' => mt_rand(1, 100),
            'user_id' => mt_rand(1, 3),
            'country_id' => mt_rand(1, 2),
            'category_id' => mt_rand(1, 2),
            'steps' => $this->faker->paragraph(20),
            'ingredients' => $this->faker->paragraph(20),
        ];
    }
}

// collect($this->faker->paragraphs(mt_rand(5, 10)))->map(
//                 fn ($p) => "<p>$p</p>"
//             )->implode(''),