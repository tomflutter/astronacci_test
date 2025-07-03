<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h1 class="text-xl font-bold text-red-600">Akses Dibatasi</h1>
        <p class="mt-2 text-gray-700 dark:text-gray-200">{{ $message }}</p>
        <a href="{{ route('dashboard') }}" class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Kembali ke Dashboard
        </a>
    </div>
</x-app-layout>
