@extends('layouts.admin')

@section('title', 'Edit Social Media Link')
@section('header', 'Edit Social Media Link')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <form action="{{ route('admin.social-media.update', $socialMedia) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="platform" class="block text-sm font-medium text-gray-700 mb-2">Platform</label>
                <select name="platform" id="platform" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">Select a platform</option>
                    <option value="Facebook" {{ old('platform', $socialMedia->platform) == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                    <option value="Twitter" {{ old('platform', $socialMedia->platform) == 'Twitter' ? 'selected' : '' }}>Twitter</option>
                    <option value="Instagram" {{ old('platform', $socialMedia->platform) == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                    <option value="LinkedIn" {{ old('platform', $socialMedia->platform) == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                    <option value="YouTube" {{ old('platform', $socialMedia->platform) == 'YouTube' ? 'selected' : '' }}>YouTube</option>
                    <option value="GitHub" {{ old('platform', $socialMedia->platform) == 'GitHub' ? 'selected' : '' }}>GitHub</option>
                    <option value="TikTok" {{ old('platform', $socialMedia->platform) == 'TikTok' ? 'selected' : '' }}>TikTok</option>
                    <option value="Pinterest" {{ old('platform', $socialMedia->platform) == 'Pinterest' ? 'selected' : '' }}>Pinterest</option>
                </select>
                @error('platform')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="link" class="block text-sm font-medium text-gray-700 mb-2">Profile URL</label>
                <input type="url" name="link" id="link" value="{{ old('link', $socialMedia->link) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                <p class="mt-1 text-sm text-gray-500">Full URL to your profile (including https://)</p>
                @error('link')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                <select name="icon" id="icon" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">Select an icon</option>
                    <option value="fab fa-facebook" {{ old('icon', $socialMedia->icon) == 'fab fa-facebook' ? 'selected' : '' }}>Facebook</option>
                    <option value="fab fa-twitter" {{ old('icon', $socialMedia->icon) == 'fab fa-twitter' ? 'selected' : '' }}>Twitter</option>
                    <option value="fab fa-instagram" {{ old('icon', $socialMedia->icon) == 'fab fa-instagram' ? 'selected' : '' }}>Instagram</option>
                    <option value="fab fa-linkedin" {{ old('icon', $socialMedia->icon) == 'fab fa-linkedin' ? 'selected' : '' }}>LinkedIn</option>
                    <option value="fab fa-youtube" {{ old('icon', $socialMedia->icon) == 'fab fa-youtube' ? 'selected' : '' }}>YouTube</option>
                    <option value="fab fa-github" {{ old('icon', $socialMedia->icon) == 'fab fa-github' ? 'selected' : '' }}>GitHub</option>
                    <option value="fab fa-tiktok" {{ old('icon', $socialMedia->icon) == 'fab fa-tiktok' ? 'selected' : '' }}>TikTok</option>
                    <option value="fab fa-pinterest" {{ old('icon', $socialMedia->icon) == 'fab fa-pinterest' ? 'selected' : '' }}>Pinterest</option>
                </select>
                <p class="mt-1 text-sm text-gray-500">Font Awesome icon for the social media platform</p>
                @error('icon')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('admin.social-media.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300 transition-colors duration-200">Cancel</a>
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i> Update Link
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
