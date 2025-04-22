@extends('layouts.admin')

@section('title', 'Create Profile')
@section('header', 'Create Profile')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <!-- In your form tag -->
        <form method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Profile Photo</label>
                <input type="file" name="photo" id="photo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                <p class="mt-1 text-sm text-gray-500">Upload an image (JPG, PNG, GIF up to 2MB)</p>
                @error('photo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="cv_link" class="block text-sm font-medium text-gray-700 mb-2">CV Link</label>
                <input type="url" name="cv_link" id="cv_link" value="{{ old('cv_link') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                <p class="mt-1 text-sm text-gray-500">Link to your CV or resume (e.g., Google Drive, Dropbox)</p>
                @error('cv_link')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Skills Section -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Skills</label>
                <div id="skills-container" class="space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="text" name="skills[]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="e.g. JavaScript, Laravel, UI/UX Design" required>
                        <button type="button" class="remove-skill px-2 py-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition-colors duration-200">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <button type="button" id="add-skill" class="mt-2 inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-plus mr-2"></i> Add Skill
                </button>
                @error('skills')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                @error('skills.*')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('admin.profile.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300 transition-colors duration-200">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i> Save Profile
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('skills-container');
    const addButton = document.getElementById('add-skill');

    // Add new skill input
    addButton.addEventListener('click', function() {
        const skillDiv = document.createElement('div');
        skillDiv.className = 'flex items-center space-x-2';
        skillDiv.innerHTML = `
            <input type="text" name="skills[]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="e.g. JavaScript, Laravel, UI/UX Design">
            <button type="button" class="remove-skill px-2 py-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition-colors duration-200">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(skillDiv);
    });

    // Remove skill input
    container.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-skill') || e.target.closest('.remove-skill')) {
            const skillDiv = e.target.closest('.flex');
            // Make sure we always have at least one skill field
            if (container.children.length > 1) {
                skillDiv.remove();
            } else {
                skillDiv.querySelector('input').value = '';
            }
        }
    });
});
</script>
@endsection
