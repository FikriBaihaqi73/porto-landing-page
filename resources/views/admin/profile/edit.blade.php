@extends('layouts.admin')

@section('title', 'Edit Profile')
@section('header', 'Edit Profile')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <form action="{{ route('admin.profile.update', $profile) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $profile->name) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('description', $profile->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Profile Photo</label>
                @if($profile->photo)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $profile->photo) }}" alt="Current Profile Photo" class="h-32 w-32 object-cover rounded-lg">
                        <p class="mt-1 text-sm text-gray-500">Current photo</p>
                    </div>
                @endif
                <input type="file" name="photo" id="photo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <p class="mt-1 text-sm text-gray-500">Leave empty to keep current photo. Maximum size: 2MB.</p>
                @error('photo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="cv_link" class="block text-sm font-medium text-gray-700 mb-2">CV Link (Optional)</label>
                <input type="url" name="cv_link" id="cv_link" value="{{ old('cv_link', $profile->cv_link) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <p class="mt-1 text-sm text-gray-500">Link to your CV or resume (e.g., Google Drive, Dropbox)</p>
                @error('cv_link')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('admin.profile.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300 transition-colors duration-200">Cancel</a>
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i> Update Profile
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
