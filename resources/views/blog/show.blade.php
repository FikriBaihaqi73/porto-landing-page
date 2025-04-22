@extends('layouts.app')

@section('title', $blog->title)

@section('content')
<div class="pt-24">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden" data-aos="fade-up">
            <!-- Back button -->
            <div class="p-6 bg-gray-50 dark:bg-gray-700">
                <a href="{{ route('home') }}#blog" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Blog
                </a>
            </div>

            <!-- Blog image -->
            @if($blog->image)
                <div class="w-full h-96 overflow-hidden">
                    <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="w-full h-full object-cover object-center">
                </div>
            @endif

            <!-- Blog details -->
            <div class="p-8">
                <div class="mb-6">
                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                        {{ $blog->created_at->format('F d, Y') }}
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-4">{{ $blog->title }}</h1>
                    <div class="prose prose-lg max-w-none text-white space-y-6">
                        {!! nl2br(e($blog->content)) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Related posts -->
        @if(isset($relatedBlogs) && $relatedBlogs->count() > 0)
        <div class="mt-12" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Related Posts</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($relatedBlogs as $relatedBlog)
                    <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-md transition-all duration-300 hover:shadow-lg">
                        @if($relatedBlog->image)
                            <img src="{{ $relatedBlog->image }}" alt="{{ $relatedBlog->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                                {{ $relatedBlog->created_at->format('M d, Y') }}
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $relatedBlog->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">{{ Str::limit(strip_tags($relatedBlog->content), 100) }}</p>
                            <a href="{{ route('blog.show', $relatedBlog) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium">
                                Read More →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
