@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <!-- Hero Section -->
    <section class="pt-32 pb-20 bg-gradient-to-b from-white to-gray-100 dark:from-gray-900 dark:to-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0" data-aos="fade-right">
                    @if($profile && $profile->photo)
                        <img src="{{ asset('storage/' . $profile->photo) }}" alt="Profile Photo" class="rounded-full w-64 h-64 object-cover mx-auto shadow-lg">
                    @else
                        <div class="rounded-full w-64 h-64 bg-gray-300 dark:bg-gray-700 mx-auto flex items-center justify-center">
                            <svg class="w-32 h-32 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="md:w-1/2 text-center md:text-left" data-aos="fade-left">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ auth()->user()->name ?? 'Welcome to My Portfolio' }}
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-6">
                        {{ $profile->description ?? 'I am a passionate developer with expertise in web development and design.' }}
                    </p>
                    @if($profile && $profile->cv_link)
                        <a href="{{ $profile->cv_link }}" target="_blank" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-300">
                            Download CV
                            <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-20 bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                    My Portfolio
                </h2>
                <p class="mt-4 text-lg text-gray-500 dark:text-gray-400">
                    Check out some of my recent projects
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($portfolios ?? [] as $portfolio)
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-all duration-300 hover:shadow-xl" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                        @if($portfolio->image)
                            <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $portfolio->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">{{ Str::limit($portfolio->description, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('portfolio.show', $portfolio) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium">
                                    View Details
                                </a>
                                <a href="{{ $portfolio->project_link }}" target="_blank" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-300">
                                    Visit Project
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 bg-gray-50 dark:bg-gray-800 rounded-lg" data-aos="fade-up">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No projects</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Projects will appear here once added.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="py-20 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                    My Blog
                </h2>
                <p class="mt-4 text-lg text-gray-500 dark:text-gray-400">
                    Read my latest articles and thoughts
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($blogs ?? [] as $blog)
                    <div class="bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-lg transition-all duration-300 hover:shadow-xl" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                                {{ $blog->created_at->format('M d, Y') }}
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $blog->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                            <a href="{{ route('blog.show', $blog) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium">
                                Read More →
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 bg-white dark:bg-gray-900 rounded-lg" data-aos="fade-up">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No blog posts</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Blog posts will appear here once added.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Social Media Section -->
    <section id="contact" class="py-20 bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                    Connect With Me
                </h2>
                <p class="mt-4 text-lg text-gray-500 dark:text-gray-400">
                    Follow me on social media
                </p>
            </div>

            @include('components.social-media', ['socialMedia' => $socialMedia ?? []])
        </div>
    </section>
@endsection
