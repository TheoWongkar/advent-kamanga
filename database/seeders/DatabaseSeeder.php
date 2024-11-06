<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Theoterra',
            'email' => 'theo@gmail.com',
            'password' => bcrypt('password'),
        ]);
        User::factory(2)->create();

        Category::factory()->create([
            'category' => 'Ibadah',
        ]);
        Category::factory()->create([
            'category' => 'Pelayanan',
        ]);
        Category::factory()->create([
            'category' => 'Event',
        ]);
        Post::factory(10)->create();
    }
}
