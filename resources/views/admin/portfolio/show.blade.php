@extends('layouts.admin')

@section('title', 'View Portfolio')
@section('header', 'Portfolio Details')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">{{ $portfolio->title }}</h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition-colors duration-200">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
                <a href="{{ route('portfolio.show', $portfolio) }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md transition-colors duration-200">
                    <i class="fas fa-eye mr-2"></i> View Live
                </a>
                <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this portfolio project?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition-colors duration-200">
                        <i class="fas fa-trash mr-2"></i> Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="mb-8">
            <a href="{{ route('admin.portfolio.index') }}" class="text-indigo-600 hover:text-indigo-800">
                <i class="fas fa-arrow-left mr-2"></i> Back to Portfolio List
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-1">
                @if($portfolio->image)
                    <div class="rounded-lg overflow-hidden shadow-md mb-4">
                        <img src="{{ $portfolio->image }}" alt="{{ $portfolio->title }}" class="w-full h-auto">
                    </div>
                @else
                    <div class="rounded-lg bg-gray-200 h-64 flex items-center justify-center mb-4">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif

                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-gray-700 mb-2">Project Link</h3>
                    <a href="{{ $portfolio->project_link }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 break-all">
                        {{ $portfolio->project_link }}
                    </a>
                </div>
            </div>

            <div class="md:col-span-2">
                <div class="bg-gray-100 p-6 rounded-lg">
                    <h3 class="font-semibold text-gray-700 mb-2">Description</h3>
                    <div class="text-gray-600 whitespace-pre-line">
                        {{ $portfolio->description }}
                    </div>
                </div>

                <div class="mt-6 bg-gray-100 p-6 rounded-lg">
                    <h3 class="font-semibold text-gray-700 mb-2">Metadata</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Created</p>
                            <p>{{ $portfolio->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Last Updated</p>
                            <p>{{ $portfolio->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
