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
            'description' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(
                fn ($p) => "<p>$p</p>"
            )->implode(''),
            'steps' => $this->faker->paragraph(),
            'ingredients' => $this->faker->paragraph(),
        ];
    }
}
