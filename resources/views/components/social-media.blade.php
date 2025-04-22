<div class="flex justify-center space-x-6">
    @forelse($socialMedia as $item)
        @if($item->is_active)
            <a href="{{ $item->url }}" target="_blank" class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition-colors duration-300">
                <i class="{{ $item->icon }} text-2xl"></i>
                <span class="sr-only">{{ $item->platform }}</span>
            </a>
        @endif
    @empty
        <!-- No social media links -->
    @endforelse
</div>
