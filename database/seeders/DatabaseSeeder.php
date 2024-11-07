<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Worship;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Congregation;
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
            'color' => 'green',
        ]);
        Category::factory()->create([
            'category' => 'Pelayanan',
            'color' => 'blue',
        ]);
        Category::factory()->create([
            'category' => 'Event',
            'color' => 'red',
        ]);

        Congregation::factory(6)->create();
        Worship::factory(6)->create();
        Post::factory(10)->create();
    }
}
