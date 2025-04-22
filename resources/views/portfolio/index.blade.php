@extends('layouts.app')

@section('title', 'All Projects')

@section('content')
<div class="pt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">
            <a href="{{ route('home') }}#portfolio" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>

        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">Semua Proyek</h1>

        @if(count($portfolios) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($portfolios as $portfolio)
                    <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index % 3 * 100 }}">
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

            <div class="mt-8">
                {{ $portfolios->links() }}
            </div>
        @else
            <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10l8 4"></path>
                </svg>
                <p class="text-gray-600 dark:text-gray-400">Belum ada proyek yang tersedia.</p>
            </div>
        @endif
    </div>
</div>
@endsection
