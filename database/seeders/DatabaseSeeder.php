<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Country;
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

        Country::create([
            'name' => 'Internasional',
            'slug' => 'internasional'
        ]);

        Country::create([
            'name' => 'Local',
            'slug' => 'local'
        ]);

        User::create([
            'name' => 'user',
            'username' => 'jojo',
            'telepon' => '08999990455',
            'email' => 'raihan@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        Recipe::factory(20)->create();
    }
}
