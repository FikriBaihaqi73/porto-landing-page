@extends('layouts.admin')

@section('title', 'Manage Profile')
@section('header', 'Profile Management')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Your Profile</h2>
            @if(!$profile)
            <a href="{{ route('admin.profile.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i> Create Profile
            </a>
            @endif
        </div>

        @if($profile)
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/3 mb-6 md:mb-0">
                @if($profile->photo)
                <img src="{{ $profile->photo }}" alt="Profile Photo" class="rounded-lg w-full max-w-xs mx-auto shadow-md">
                @else
                <div class="bg-gray-200 rounded-lg w-full max-w-xs h-64 mx-auto flex items-center justify-center">
                    <i class="fas fa-user-circle text-gray-400 text-5xl"></i>
                </div>
                @endif
            </div>
            <div class="md:w-2/3 md:pl-8">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">{{ $profile->name }}</h3>
                </div>
                <div class="mb-4">
                    <h4 class="text-sm font-medium text-gray-500 mb-1">Description</h4>
                    <p class="text-gray-700">{{ $profile->description }}</p>
                </div>

                <!-- Skills Section -->
                @if($profile->skills && count($profile->skills) > 0)
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-500 mb-2">Skills</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($profile->skills as $skill)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                {{ $skill }}
                            </span>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($profile->cv_link)
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-500 mb-1">CV Link</h4>
                    <a href="{{ $profile->cv_link }}" target="_blank" class="text-blue-500 hover:text-blue-700">
                        {{ $profile->cv_link }} <i class="fas fa-external-link-alt ml-1 text-xs"></i>
                    </a>
                </div>
                @endif
                <div class="flex space-x-3">
                    <a href="{{ route('admin.profile.edit', $profile) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md transition-colors duration-200">
                        <i class="fas fa-edit mr-2"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
        @else
        <div class="bg-gray-100 rounded-lg p-6 text-center">
            <i class="fas fa-user-circle text-gray-400 text-5xl mb-4"></i>
            <p class="text-gray-600 mb-4">No profile has been created yet.</p>
            <a href="{{ route('admin.profile.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i> Create Profile
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
