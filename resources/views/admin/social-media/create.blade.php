@extends('layouts.admin')

@section('title', 'Add Social Media Link')
@section('header', 'Add New Social Media Link')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <form action="{{ route('admin.social-media.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="platform" class="block text-sm font-medium text-gray-700 mb-2">Platform</label>
                <select name="platform" id="platform" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">Select Platform</option>

                    <!-- Social Media Umum -->
                    <option value="Facebook" {{ old('platform') == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                    <option value="Twitter" {{ old('platform') == 'Twitter' ? 'selected' : '' }}>Twitter</option>
                    <option value="Instagram" {{ old('platform') == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                    <option value="LinkedIn" {{ old('platform') == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                    <option value="YouTube" {{ old('platform') == 'YouTube' ? 'selected' : '' }}>YouTube</option>
                    <option value="TikTok" {{ old('platform') == 'TikTok' ? 'selected' : '' }}>TikTok</option>
                    <option value="Pinterest" {{ old('platform') == 'Pinterest' ? 'selected' : '' }}>Pinterest</option>
                    <option value="Snapchat" {{ old('platform') == 'Snapchat' ? 'selected' : '' }}>Snapchat</option>
                    <option value="WhatsApp" {{ old('platform') == 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
                    <option value="Telegram" {{ old('platform') == 'Telegram' ? 'selected' : '' }}>Telegram</option>
                    <option value="Discord" {{ old('platform') == 'Discord' ? 'selected' : '' }}>Discord</option>
                    <option value="Reddit" {{ old('platform') == 'Reddit' ? 'selected' : '' }}>Reddit</option>
                    <option value="Twitch" {{ old('platform') == 'Twitch' ? 'selected' : '' }}>Twitch</option>
                    <option value="Medium" {{ old('platform') == 'Medium' ? 'selected' : '' }}>Medium</option>

                    <!-- Social Media untuk Programmer/Designer -->
                    <option value="GitHub" {{ old('platform') == 'GitHub' ? 'selected' : '' }}>GitHub</option>
                    <option value="GitLab" {{ old('platform') == 'GitLab' ? 'selected' : '' }}>GitLab</option>
                    <option value="Bitbucket" {{ old('platform') == 'Bitbucket' ? 'selected' : '' }}>Bitbucket</option>
                    <option value="StackOverflow" {{ old('platform') == 'StackOverflow' ? 'selected' : '' }}>Stack Overflow</option>
                    <option value="Dev.to" {{ old('platform') == 'Dev.to' ? 'selected' : '' }}>Dev.to</option>
                    <option value="CodePen" {{ old('platform') == 'CodePen' ? 'selected' : '' }}>CodePen</option>
                    <option value="Dribbble" {{ old('platform') == 'Dribbble' ? 'selected' : '' }}>Dribbble</option>
                    <option value="Behance" {{ old('platform') == 'Behance' ? 'selected' : '' }}>Behance</option>
                    <option value="Kaggle" {{ old('platform') == 'Kaggle' ? 'selected' : '' }}>Kaggle</option>
                    <option value="HackerRank" {{ old('platform') == 'HackerRank' ? 'selected' : '' }}>HackerRank</option>
                    <option value="LeetCode" {{ old('platform') == 'LeetCode' ? 'selected' : '' }}>LeetCode</option>
                    <option value="Hashnode" {{ old('platform') == 'Hashnode' ? 'selected' : '' }}>Hashnode</option>
                </select>
                @error('platform')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="url" class="block text-sm font-medium text-gray-700 mb-2">URL</label>
                <input type="url" name="url" id="url" value="{{ old('url') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                <p class="mt-1 text-sm text-gray-500">Full URL including https://</p>
                @error('url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                <select name="icon" id="icon" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">Select Icon</option>
                    <option value="fab fa-facebook" {{ old('icon') == 'fab fa-facebook' ? 'selected' : '' }}>
                        <i class="fab fa-facebook"></i> Facebook
                    </option>
                    <option value="fab fa-twitter" {{ old('icon') == 'fab fa-twitter' ? 'selected' : '' }}>
                        <i class="fab fa-twitter"></i> Twitter
                    </option>
                    <option value="fab fa-instagram" {{ old('icon') == 'fab fa-instagram' ? 'selected' : '' }}>
                        <i class="fab fa-instagram"></i> Instagram
                    </option>
                    <option value="fab fa-linkedin" {{ old('icon') == 'fab fa-linkedin' ? 'selected' : '' }}>
                        <i class="fab fa-linkedin"></i> LinkedIn
                    </option>
                    <option value="fab fa-github" {{ old('icon') == 'fab fa-github' ? 'selected' : '' }}>
                        <i class="fab fa-github"></i> GitHub
                    </option>
                    <option value="fab fa-youtube" {{ old('icon') == 'fab fa-youtube' ? 'selected' : '' }}>
                        <i class="fab fa-youtube"></i> YouTube
                    </option>
                    <option value="fab fa-tiktok" {{ old('icon') == 'fab fa-tiktok' ? 'selected' : '' }}>
                        <i class="fab fa-tiktok"></i> TikTok
                    </option>
                    <option value="fab fa-pinterest" {{ old('icon') == 'fab fa-pinterest' ? 'selected' : '' }}>
                        <i class="fab fa-pinterest"></i> Pinterest
                    </option>
                    <option value="fab fa-snapchat" {{ old('icon') == 'fab fa-snapchat' ? 'selected' : '' }}>
                        <i class="fab fa-snapchat"></i> Snapchat
                    </option>
                    <option value="fab fa-whatsapp" {{ old('icon') == 'fab fa-whatsapp' ? 'selected' : '' }}>
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </option>
                    <option value="fab fa-telegram" {{ old('icon') == 'fab fa-telegram' ? 'selected' : '' }}>
                        <i class="fab fa-telegram"></i> Telegram
                    </option>
                    <option value="fab fa-discord" {{ old('icon') == 'fab fa-discord' ? 'selected' : '' }}>
                        <i class="fab fa-discord"></i> Discord
                    </option>
                    <option value="fab fa-reddit" {{ old('icon') == 'fab fa-reddit' ? 'selected' : '' }}>
                        <i class="fab fa-reddit"></i> Reddit
                    </option>
                    <option value="fab fa-twitch" {{ old('icon') == 'fab fa-twitch' ? 'selected' : '' }}>
                        <i class="fab fa-twitch"></i> Twitch
                    </option>
                    <option value="fab fa-medium" {{ old('icon') == 'fab fa-medium' ? 'selected' : '' }}>
                        <i class="fab fa-medium"></i> Medium
                    </option>
                    <option value="fab fa-gitlab" {{ old('icon') == 'fab fa-gitlab' ? 'selected' : '' }}>
                        <i class="fab fa-gitlab"></i> GitLab
                    </option>
                    <option value="fab fa-bitbucket" {{ old('icon') == 'fab fa-bitbucket' ? 'selected' : '' }}>
                        <i class="fab fa-bitbucket"></i> Bitbucket
                    </option>
                    <option value="fab fa-stack-overflow" {{ old('icon') == 'fab fa-stack-overflow' ? 'selected' : '' }}>
                        <i class="fab fa-stack-overflow"></i> Stack Overflow
                    </option>
                    <option value="fab fa-dev" {{ old('icon') == 'fab fa-dev' ? 'selected' : '' }}>
                        <i class="fab fa-dev"></i> Dev.to
                    </option>
                    <option value="fab fa-codepen" {{ old('icon') == 'fab fa-codepen' ? 'selected' : '' }}>
                        <i class="fab fa-codepen"></i> CodePen
                    </option>
                    <option value="fab fa-dribbble" {{ old('icon') == 'fab fa-dribbble' ? 'selected' : '' }}>
                        <i class="fab fa-dribbble"></i> Dribbble
                    </option>
                    <option value="fab fa-behance" {{ old('icon') == 'fab fa-behance' ? 'selected' : '' }}>
                        <i class="fab fa-behance"></i> Behance
                    </option>
                </select>
                <p class="mt-1 text-sm text-gray-500">Select the appropriate Font Awesome icon</p>
                @error('icon')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active') ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
                </div>
                <p class="mt-1 text-sm text-gray-500">Show this social media link on the website</p>
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('admin.social-media.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300 transition-colors duration-200">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i> Save Link
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-select matching icon when platform is selected
    const platformSelect = document.getElementById('platform');
    const iconSelect = document.getElementById('icon');

    platformSelect.addEventListener('change', function() {
        const platform = this.value.toLowerCase();
        const iconOptions = iconSelect.options;

        for (let i = 0; i < iconOptions.length; i++) {
            if (iconOptions[i].value.includes(platform)) {
                iconSelect.selectedIndex = i;
                break;
            }
        }
    });
});
</script>
@endsection
