@extends('layouts.app')

@section('title', 'All Blog Posts')

@section('content')
<div class="pt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">
            <a href="{{ route('home') }}#blog" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>

        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">Semua Blog Posts</h1>

        @if(count($blogs) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($blogs as $blog)
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index % 3 * 100 }}">
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

            <div class="mt-8">
                {{ $blogs->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-md">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <p class="text-gray-600 dark:text-gray-400">Belum ada blog post yang tersedia.</p>
            </div>
        @endif
    </div>
</div>
@endsection
