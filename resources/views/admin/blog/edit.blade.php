@extends('layouts.admin')

@section('title', 'Edit Blog Post')
@section('header', 'Edit Blog Post')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <form action="{{ route('admin.blog.update', $blog) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Post Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Post Content</label>
                <textarea name="content" id="content" rows="12" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('content', $blog->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>

                @if($blog->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="h-32 w-auto object-cover rounded">
                    <p class="mt-1 text-sm text-gray-500">Current image</p>
                </div>
                @endif

                <input type="file" name="image" id="image" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <p class="mt-1 text-sm text-gray-500">Leave empty to keep the current image. Recommended size: 1200x630px. Maximum size: 2MB.</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('admin.blog.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300 transition-colors duration-200">Cancel</a>
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i> Update Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
