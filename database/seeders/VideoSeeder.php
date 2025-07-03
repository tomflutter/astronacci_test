<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Video::create([
                'judul' => "Video Ke-$i",
                'url' => "https://www.youtube.com/embed/dQw4w9WgXcQ", // Ganti sesuai kebutuhan
                'deskripsi' => "Ini adalah deskripsi video ke-$i.",
            ]);
        }
    }
}