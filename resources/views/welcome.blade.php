<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Astronacci Membership</title>
  <link href="https://unpkg.com/tailwindcss@^3/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 antialiased">
  <nav class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="#" class="text-xl font-bold text-red-600">Astronacci</a>
      <div class="space-x-4">
        @auth
          <a href="{{ route('dashboard') }}" class="hover:text-red-600">Dashboard</a>
          <form method="POST" action="{{ route('logout') }}" class="inline">@csrf<button class="hover:text-red-600">Logout</button></form>
        @else
          <a href="{{ route('login') }}" class="hover:text-red-600">Login</a>
          <a href="{{ route('register') }}" class="hover:text-red-600">Register</a>
        @endauth
      </div>
    </div>
  </nav>

  <header class="text-center py-16 bg-red-100 dark:bg-red-900/20">
    <h1 class="text-4xl font-extrabold mb-4">Welcome to Astronacci Membership</h1>
    <p class="text-lg">Access premium articles and exclusive video content just for you.</p>
    @guest
      <a href="{{ route('register') }}" class="mt-6 inline-block bg-red-600 text-white px-6 py-3 rounded-lg shadow hover:bg-red-700">Join Now</a>
    @endguest
  </header>

  <main class="max-w-6xl mx-auto py-12 space-y-16">
    {{-- SECTION: Artikel --}}
    <section id="articles">
      <h2 class="text-2xl font-semibold mb-6">Latest Articles</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($articles as $article)
          <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition group">
            <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="h-48 w-full object-cover rounded-t-lg group-hover:scale-105 transition" />
            <div class="p-6">
              <h3 class="text-xl font-bold mb-2">{{ $article->title }}</h3>
              <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">{{ Str::limit($article->excerpt, 110) }}</p>
              <a href="{{ route('articles.show', $article) }}" class="mt-4 inline-block text-red-600 hover:underline">Read More →</a>
            </div>
          </div>
        @endforeach
      </div>
    </section>

    {{-- SECTION: Video --}}
    <section id="videos">
      <h2 class="text-2xl font-semibold mb-6">Exclusive Videos</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($videos as $video)
          <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden group">
            <div class="relative pb-9/16">
              <iframe src="https://www.youtube.com/embed/{{ $video->youtube_id }}" class="absolute inset-0 w-full h-full" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="p-6">
              <h3 class="text-lg font-semibold">{{ $video->title }}</h3>
              <p class="text-gray-500 dark:text-gray-400 text-sm">{{ Str::limit($video->description, 80) }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </section>
  </main>

  <footer class="text-center py-8 border-t bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700">
    <p class="text-sm">&copy; {{ date('Y') }} Astronacci. All rights reserved.</p>
  </footer>
</body>
</html>
