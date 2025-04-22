@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <!-- Hero Section - Simplified Formal Design -->
    <section class="pt-32 pb-20 bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0" data-aos="fade-right">
                    @if($profile && $profile->photo)
                        <img src="{{ $profile->photo }}" alt="{{ $profile->name ?? 'Profile Photo' }}" class="rounded-full w-64 h-64 object-cover mx-auto shadow-md border border-gray-200 dark:border-gray-700">
                    @else
                        <div class="rounded-full w-64 h-64 bg-gray-200 dark:bg-gray-700 mx-auto flex items-center justify-center border border-gray-300 dark:border-gray-600 shadow-md">
                            <svg class="w-32 h-32 text-gray-400 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="md:w-1/2 text-center md:text-left" data-aos="fade-left">
                    <div class="inline-block mb-4 px-3 py-1 bg-gray-100 dark:bg-gray-700 rounded-md text-gray-600 dark:text-gray-300 text-sm font-medium">
                        Professional Developer
                    </div>
                    <h1 class="text-4xl font-bold text-gray-800 dark:text-white mb-4">
                        {{ $profile->name ?? 'Welcome to My Portfolio' }}
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                        {{ $profile->description ?? 'I am a professional developer with expertise in web development and design, delivering high-quality solutions for businesses.' }}
                    </p>

                    <!-- Skills Section - Moved here from bottom of file -->
                    @if($profile && $profile->skills && count($profile->skills) > 0)
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Skills</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($profile->skills as $skill)
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 border border-gray-300 dark:border-gray-600">
                                    {{ $skill }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Enhanced CV Download Section -->
                    @if($profile && $profile->cv_link)
                    <div class="mb-8 bg-gray-100 dark:bg-gray-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                        <div class="flex flex-col sm:flex-row items-center justify-between">
                            <div class="flex items-center mb-4 sm:mb-0">
                                <svg class="w-10 h-10 text-gray-700 dark:text-gray-300 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <div>
                                    <h3 class="text-lg font-medium text-gray-800 dark:text-white">My Resume</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Download my complete CV to learn more about my experience</p>
                                </div>
                            </div>
                            <a href="{{ $profile->cv_link }}" target="_blank" class="inline-flex items-center px-5 py-2.5 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 transition-colors duration-300">
                                Download CV
                                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endif

                    <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                        <a href="#portfolio" class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-gray-600 text-base font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-300">
                            View Projects
                            <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">My Portfolio</h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">Check out some of my recent projects and work.</p>
            </div>

            @if(count($portfolios) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($portfolios as $portfolio)
                        <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            @if($portfolio->image)
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ $portfolio->image }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                </div>
                            @endif
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $portfolio->title }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">{{ $portfolio->description }}</p>
                                <div class="flex justify-between items-center">
                                    <a href="{{ route('portfolio.show', $portfolio) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium">
                                        View Details
                                    </a>
                                    <a href="{{ $portfolio->project_link }}" target="_blank" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Tombol Lihat Semua Portfolio -->
                <div class="text-center mt-12">
                    <a href="{{ route('portfolio.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-700 dark:hover:bg-indigo-800 transition-colors duration-300">
                        Lihat Semua Portfolio
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            @else
                <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-lg shadow-md" data-aos="fade-up">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10l8 4"></path>
                    </svg>
                    <p class="text-gray-600 dark:text-gray-400">No portfolio projects available yet.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Latest Blog Posts</h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">Read my thoughts on technology, development, and more.</p>
            </div>

            @if(count($blogs) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($blogs as $blog)
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            @if($blog->image)
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                                    {{ $blog->created_at->format('F d, Y') }}
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $blog->title }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">{{ Str::limit(strip_tags($blog->content), 150) }}</p>
                                <a href="{{ route('blog.show', $blog) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium">
                                    Read More →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Tombol Lihat Semua Blog -->
                <div class="text-center mt-12">
                    <a href="{{ route('blog.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-700 dark:hover:bg-indigo-800 transition-colors duration-300">
                        Lihat Semua Blog
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-md" data-aos="fade-up">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    <p class="text-gray-600 dark:text-gray-400">No blog posts available yet.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Social Media Section -->
    <section id="contact" class="py-20 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white sm:text-4xl">
                    Connect With Me
                </h2>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Professional networks and contact information
                </p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 max-w-4xl mx-auto">
                @forelse($socialMedia ?? [] as $social)
                    <a href="{{ $social->url }}" target="_blank" class="flex flex-col items-center justify-center p-6 bg-gray-50 dark:bg-gray-700 rounded-lg transition-all duration-300 hover:shadow-md" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-200 dark:bg-gray-600 mb-3">
                            <i class="{{ $social->icon }} text-xl text-gray-700 dark:text-gray-300"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300 text-sm">{{ $social->platform }}</span>
                    </a>
                @empty
                    <div class="col-span-full text-center py-12 bg-gray-50 dark:bg-gray-700 rounded-lg" data-aos="fade-up">
                        <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-800 dark:text-white">No social media links available</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-400">Social media links will appear here once added.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
