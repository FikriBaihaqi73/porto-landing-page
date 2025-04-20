@extends('layouts.admin')

@section('title', 'Manage Social Media')
@section('header', 'Social Media Management')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Your Social Media Links</h2>
            <a href="{{ route('admin.social-media.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i> Add New Link
            </a>
        </div>

        @if($socialMedia->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Platform</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">URL</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($socialMedia as $social)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            <i class="fab fa-{{ strtolower($social->platform) }} mr-2"></i>
                                            {{ $social->platform }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500 truncate max-w-xs">
                                        <a href="{{ $social->url }}" target="_blank" class="text-blue-500 hover:text-blue-700">
                                            {{ $social->url }}
                                            <i class="fas fa-external-link-alt ml-1 text-xs"></i>
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.social-media.edit', $social) }}" class="text-yellow-600 hover:text-yellow-900">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.social-media.destroy', $social) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this social media link?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-gray-100 rounded-lg p-6 text-center">
                <i class="fas fa-share-alt text-gray-400 text-5xl mb-4"></i>
                <p class="text-gray-600 mb-4">No social media links have been added yet.</p>
                <a href="{{ route('admin.social-media.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition-colors duration-200">
                    <i class="fas fa-plus mr-2"></i> Add First Link
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
