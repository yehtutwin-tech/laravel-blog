<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
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
            'name' => 'Ko Ko',
            'email' => 'koko@example.com',
        ]);

        User::factory()->create([
            'name' => 'Mg Mg',
            'email' => 'mgmg@example.com',
        ]);

        Article::factory(20)->create();
        Category::factory(5)->create();
        Comment::factory(50)->create();
    }
}
