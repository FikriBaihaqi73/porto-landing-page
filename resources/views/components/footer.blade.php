<footer class="bg-white dark:bg-gray-800 shadow-inner py-8 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-6 md:mb-0">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">Muhammad Fikri Baihaqi</h2>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">© {{ date('Y') }} All rights reserved.</p>
            </div>

            <div class="flex space-x-6">
                @foreach(App\Models\SocialMedia::all() as $social)
                <a href="{{ $social->link }}" target="_blank" rel="noopener noreferrer" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white">
                    <span class="sr-only">{{ $social->platform }}</span>
                    <i class="{{ $social->icon }} text-xl"></i>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>
