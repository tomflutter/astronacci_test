<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{

public function index()
{
    $user = Auth::user();

    $limit = match ($user->membership_type) {
        'A' => 3,
        'B' => 10,
        'C' => 1000, // cukup besar agar dianggap tak terbatas
        default => 0
    };

    $articles = Article::take($limit)->get();
    $videos = Video::take($limit)->get();

    return view('dashboard', compact('articles', 'videos'));
}


// App\Http\Controllers\ContentController.php

public function showArtikel($id)
{
    $artikel = \App\Models\Article::find($id);

    if (!$artikel) {
        return view('errors.limit', ['message' => 'Artikel tidak tersedia.']);
    }

    return view('konten.artikel', compact('artikel'));
}



   // app/Http/Controllers/ContentController.php

public function showVideo($id)
{
    $video = \App\Models\Video::find($id);

    if (!$video) {
        return view('errors.limit', ['message' => 'Video tidak tersedia.']);
    }

    return view('konten.video', compact('video'));
}


}
