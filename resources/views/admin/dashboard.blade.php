@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-500 p-4">
            <i class="fas fa-user text-white text-3xl"></i>
        </div>
        <div class="p-4">
            <h3 class="font-bold text-lg mb-2">Profile</h3>
            <p class="text-gray-600 mb-4">Manage your personal information</p>
            <a href="{{ route('admin.profile.index') }}" class="text-blue-500 hover:text-blue-700 font-medium">
                Manage <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-green-500 p-4">
            <i class="fas fa-briefcase text-white text-3xl"></i>
        </div>
        <div class="p-4">
            <h3 class="font-bold text-lg mb-2">Portfolio</h3>
            <p class="text-gray-600 mb-4">Showcase your work and projects</p>
            <a href="{{ route('admin.portfolio.index') }}" class="text-green-500 hover:text-green-700 font-medium">
                Manage <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-yellow-500 p-4">
            <i class="fas fa-blog text-white text-3xl"></i>
        </div>
        <div class="p-4">
            <h3 class="font-bold text-lg mb-2">Blog</h3>
            <p class="text-gray-600 mb-4">Share your thoughts and insights</p>
            <a href="{{ route('admin.blog.index') }}" class="text-yellow-500 hover:text-yellow-700 font-medium">
                Manage <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-purple-500 p-4">
            <i class="fas fa-share-alt text-white text-3xl"></i>
        </div>
    </div>
</div>

<div class="mt-8 bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-semibold mb-4">Quick Stats</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="border rounded-lg p-4">
            <div class="flex items-center">
                <div class="rounded-full bg-blue-100 p-3 mr-4">
                    <i class="fas fa-briefcase text-blue-500"></i>
                </div>
                <div>
                    <p class="text-gray-500">Portfolio Items</p>
                    <p class="text-2xl font-bold">{{ \App\Models\Portfolio::count() }}</p>
                </div>
            </div>
        </div>

        <div class="border rounded-lg p-4">
            <div class="flex items-center">
                <div class="rounded-full bg-green-100 p-3 mr-4">
                    <i class="fas fa-blog text-green-500"></i>
                </div>
                <div>
                    <p class="text-gray-500">Blog Posts</p>
                    <p class="text-2xl font-bold">{{ \App\Models\Blog::count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
