@extends('layouts.admin')

@section('title', 'Manage Portfolio')
@section('header', 'Portfolio Management')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Your Portfolio Projects</h2>
            <a href="{{ route('admin.portfolio.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i> Add New Project
            </a>
        </div>

        @if($portfolios->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($portfolios as $portfolio)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($portfolio->image)
                                        <img src="{{ $portfolio->image }}" alt="{{ $portfolio->title }}" class="h-16 w-16 object-cover rounded">
                                    @else
                                        <div class="h-16 w-16 bg-gray-200 rounded flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $portfolio->title }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500 truncate max-w-xs">{{ $portfolio->description }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.portfolio.show', $portfolio) }}" class="text-blue-600 hover:text-blue-900">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="text-yellow-600 hover:text-yellow-900">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this project?');">
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
            <div class="mt-4">
                {{ $portfolios->links() }}
            </div>
        @else
            <div class="bg-gray-100 rounded-lg p-6 text-center">
                <i class="fas fa-briefcase text-gray-400 text-5xl mb-4"></i>
                <p class="text-gray-600 mb-4">No portfolio projects have been added yet.</p>
                <a href="{{ route('admin.portfolio.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition-colors duration-200">
                    <i class="fas fa-plus mr-2"></i> Add First Project
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
