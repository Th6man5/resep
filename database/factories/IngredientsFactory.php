<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class IngredientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'quantity' =>  mt_rand(1, 2),
        ];
    }
}

// collect($this->faker->paragraphs(mt_rand(5, 10)))->map(
//                 fn ($p) => "<p>$p</p>"
//             )->implode(''),