<footer class="bg-white dark:bg-gray-900 py-12 border-t border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Muhammad Fikri Baihaqi</h2>
            </div>

            <!-- Social Media Links -->
            <div class="mb-8">
                @include('components.social-media', ['socialMedia' => $socialMedia ?? []])
            </div>

            <div class="text-center text-gray-500 dark:text-gray-400">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
