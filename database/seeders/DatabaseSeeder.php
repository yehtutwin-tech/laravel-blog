<?php

namespace Database\Seeders;

use App\Models\ArticleTag;
use App\Models\Comment;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ArticleSeeder::class,
            CategorySeeder::class,
        ]);

        Comment::factory(50)->create();
        Tag::factory(10)->create();
        ArticleTag::factory(50)->create();
    }
}
