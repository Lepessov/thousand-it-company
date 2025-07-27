<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::all();
        $categories = Category::all();

        News::factory()->count(20)->make()->each(function ($news) use ($authors, $categories) {
            $news->author_id = $authors->random()->id;
            $news->save();

            $news->categories()->attach($categories->random(rand(1, 3))->pluck('id')->toArray());
        });
    }
}
