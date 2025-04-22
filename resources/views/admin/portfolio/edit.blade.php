@extends('layouts.admin')

@section('title', 'Edit Portfolio Project')
@section('header', 'Edit Portfolio Project')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <form action="{{ route('admin.portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Project Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $portfolio->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Project Description</label>
                <textarea name="description" id="description" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('description', $portfolio->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="project_link" class="block text-sm font-medium text-gray-700 mb-2">Project Link</label>
                <input type="url" name="project_link" id="project_link" value="{{ old('project_link', $portfolio->project_link) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                <p class="mt-1 text-sm text-gray-500">Link to the live project or repository</p>
                @error('project_link')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Project Image</label>

                @if($portfolio->image)
                <div class="mb-3">
                    <img src="{{ $portfolio->image }}" alt="{{ $portfolio->title }}" class="h-32 w-48 object-cover rounded-lg">
                    <p class="mt-1 text-sm text-gray-500">Current image</p>
                </div>
                @endif

                <input type="file" name="image" id="image" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <p class="mt-1 text-sm text-gray-500">Upload a new image (JPG, PNG, GIF up to 2MB) or leave empty to keep current image</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('admin.portfolio.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300 transition-colors duration-200">Cancel</a>
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i> Update Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
