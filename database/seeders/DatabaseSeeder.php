<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
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
        ]);

        Article::factory(20)->create();
        Category::factory(5)->create();
        Comment::factory(50)->create();
        Tag::factory(10)->create();
        ArticleTag::factory(50)->create();
    }
}
