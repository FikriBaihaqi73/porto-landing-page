@extends('layouts.admin')

@section('title', 'Create Blog Post')
@section('header', 'Create New Blog Post')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <!-- In your form tag -->
        <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Post Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Post Content</label>
                <textarea
                    name="content"
                    id="content"
                    rows="12"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 font-sans text-base leading-relaxed whitespace-pre-wrap"
                    style="min-height: 400px; line-height: 1.8;"
                    placeholder="Tulis konten blog Anda di sini...&#10;&#10;Tips format:&#10;- Gunakan baris baru (Enter) untuk membuat paragraf baru&#10;- Spasi dan format teks akan dipertahankan&#10;- Tulis dengan rapi untuk tampilan yang lebih baik"
                    required>{{ old('content') }}</textarea>
                <p class="mt-2 text-sm text-gray-500">
                    * Tekan Enter dua kali untuk membuat paragraf baru
                    * Format teks dan spasi akan ditampilkan sesuai dengan yang Anda ketik
                    * Gunakan spasi dan baris baru untuk membuat konten lebih mudah dibaca
                </p>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image URL</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <p class="mt-1 text-sm text-gray-500">Enter a valid image URL (e.g., https://example.com/image.jpg)</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('admin.blog.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300 transition-colors duration-200">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i> Publish Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
