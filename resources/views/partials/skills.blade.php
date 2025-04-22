@if($profile && $profile->skills && count($profile->skills) > 0)
<div class="mt-8 mb-10">
    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4 flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
        </svg>
        Professional Skills
    </h3>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($profile->skills as $skill)
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                <div class="text-center">
                    <span class="inline-block text-gray-800 dark:text-gray-200 font-medium">{{ $skill }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
