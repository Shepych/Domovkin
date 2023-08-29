<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++) {
            DB::table('articles')->insert([
                'title' => 'Article ' . $i,
                'slug' => Str::slug('Article ' . $i),
                'description' => fake()->text(400),
                'img' => '/img/articles/' . $i . '.webp',
                'content' => fake()->text(5000)
            ]);
        }
    }
}
