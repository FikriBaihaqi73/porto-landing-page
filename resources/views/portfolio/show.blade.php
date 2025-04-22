@extends('layouts.app')

@section('title', $portfolio->title)

@section('content')
<div class="pt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden" data-aos="fade-up">
            <!-- Back button -->
            <div class="p-6 bg-gray-50 dark:bg-gray-700">
                <a href="{{ route('home') }}#portfolio" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Portfolio
                </a>
            </div>

            <!-- Project image -->
            @if($portfolio->image)
                <div class="w-full h-96 overflow-hidden">
                    <img src="{{ $portfolio->image }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover object-center">
                </div>
            @endif

            <!-- Project details -->
            <div class="p-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 md:mb-0">{{ $portfolio->title }}</h1>
                    <a href="{{ $portfolio->project_link }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-300">
                        Visit Project
                        <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>

                <div class="prose prose-indigo max-w-none dark:prose-invert" data-aos="fade-up" data-aos-delay="100">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        {{ $portfolio->description }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Related projects -->
        @if(isset($relatedPortfolios) && $relatedPortfolios->count() > 0)
        <div class="mt-12" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">More Projects</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPortfolios as $relatedPortfolio)
                    <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-md transition-all duration-300 hover:shadow-lg">
                        @if($relatedPortfolio->image)
                            <img src="{{ asset('storage/' . $relatedPortfolio->image) }}" alt="{{ $relatedPortfolio->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $relatedPortfolio->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">{{ Str::limit($relatedPortfolio->description, 100) }}</p>
                            <a href="{{ route('portfolio.show', $relatedPortfolio) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium">
                                View Details
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
