<header class="bg-white dark:bg-gray-800 shadow-sm py-3 px-6 flex justify-between items-center">
    <!-- Left: Page Title / Placeholder -->
    <div class="text-lg font-semibold text-gray-800 dark:text-white">
        Dashboard
    </div>

    <!-- Right: User Dropdown -->
    <div class="relative">
        <button type="button" class="flex items-center gap-2 bg-gray-100 dark:bg-gray-700 rounded-full px-3 py-1.5 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                 alt="Avatar" class="w-8 h-8 rounded-full">
            <span class="hidden md:block text-sm font-medium text-gray-700 dark:text-gray-200">
                {{ Auth::user()->name }}
            </span>
            <i class="fas fa-chevron-down text-xs text-gray-500 dark:text-gray-300"></i>
        </button>

        <!-- Dropdown menu -->
        <div class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded shadow z-50 hidden group-hover:block">
            <a href="{{ route('profile.edit') }}"
               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                <i class="fas fa-user mr-2"></i> Profil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-left block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                    <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                </button>
            </form>
        </div>
    </div>
</header>
