<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Country;
use App\Models\Ingredients;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory(3)->create();

        Country::create([
            'name' => 'Internasional',
            'slug' => 'internasional'
        ]);

        Country::create([
            'name' => 'Local',
            'slug' => 'local'
        ]);

        Category::create([
            'name' => 'Bekal',
            'slug' => 'bekal'
        ]);

        Category::create([
            'name' => 'Murah',
            'slug' => 'murah'
        ]);

        User::create([
            'name' => 'user',
            'username' => 'jojo',
            'email' => 'raihan@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        User::create([
            'name' => 'patapon',
            'username' => 'gyro',
            'email' => 'coba@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        Recipe::factory(300)->create();
    }
}
