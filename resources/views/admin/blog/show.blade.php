@extends('layouts.admin')

@section('title', 'View Blog Post')
@section('header', 'Blog Post Details')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">{{ $blog->title }}</h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.blog.edit', $blog) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition-colors duration-200">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
                <a href="{{ route('blog.show', $blog) }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md transition-colors duration-200">
                    <i class="fas fa-eye mr-2"></i> View Live
                </a>
                <form action="{{ route('admin.blog.destroy', $blog) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition-colors duration-200">
                        <i class="fas fa-trash mr-2"></i> Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="mb-8">
            <a href="{{ route('admin.blog.index') }}" class="text-indigo-600 hover:text-indigo-800">
                <i class="fas fa-arrow-left mr-2"></i> Back to Blog List
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-1">
                @if($blog->image)
                    <div class="rounded-lg overflow-hidden shadow-md mb-4">
                        <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="w-full h-auto">
                    </div>
                @else
                    <div class="rounded-lg bg-gray-200 h-64 flex items-center justify-center mb-4">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                @endif

                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-gray-700 mb-2">Publication Info</h3>
                    <div class="text-gray-600">
                        <p><strong>Created:</strong> {{ $blog->created_at->format('M d, Y H:i') }}</p>
                        <p><strong>Last Updated:</strong> {{ $blog->updated_at->format('M d, Y H:i') }}</p>
                        @if($blog->user)
                            <p><strong>Author:</strong> {{ $blog->user->name }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="md:col-span-2">
                <div class="bg-gray-100 p-6 rounded-lg mb-6">
                    <h3 class="font-semibold text-gray-700 mb-2">Title</h3>
                    <div class="text-gray-600">
                        {{ $blog->title }}
                    </div>
                </div>

                <div class="bg-gray-100 p-6 rounded-lg">
                    <h3 class="font-semibold text-gray-700 mb-2">Content</h3>
                    <div class="prose max-w-none text-gray-600">
                        {!! $blog->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
