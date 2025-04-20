<div class="flex justify-center space-x-6">
    @forelse($socialMedia as $social)
        <a href="{{ $social->link }}" target="_blank" rel="noopener noreferrer"
           class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white transition-colors duration-300"
           data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
            <span class="sr-only">{{ $social->platform }}</span>
            <i class="{{ $social->icon }} text-2xl"></i>
        </a>
    @empty
        <div class="text-center text-gray-500 dark:text-gray-400">
            <p>No social media links available</p>
        </div>
    @endforelse
</div>
