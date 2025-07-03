<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Article::create([
                'judul' => "Artikel Ke-$i",
                'konten' => "Ini adalah konten dari artikel ke-$i. Lorem ipsum dolor sit amet.",
            ]);
        }
    }
}