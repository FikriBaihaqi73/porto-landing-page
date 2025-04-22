<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;

class ProfileController extends Controller
{
    /**
     * Display the profile.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $profile = Profile::first();
        return view('admin.profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new profile.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Check if profile already exists
        if (Profile::count() > 0) {
            return redirect()->route('admin.profile.index')
                ->with('error', 'Profile already exists. You can only edit the existing profile.');
        }

        return view('admin.profile.create');
    }

    /**
     * Store a newly created profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv_link' => 'required|url',
            'skills' => 'nullable|array',
            'skills.*' => 'string|max:100',
        ]);

        $profile = new Profile();
        $profile->name = $validated['name'];
        $profile->description = $validated['description'];
        $profile->cv_link = $validated['cv_link'];
        $profile->skills = $validated['skills'] ?? [];

        // Upload photo to Cloudinary
        if ($request->hasFile('photo')) {
            try {
                // Configure Cloudinary directly
                $config = new Configuration();
                $config->cloud->cloudName = env('CLOUDINARY_CLOUD_NAME');
                $config->cloud->apiKey = env('CLOUDINARY_API_KEY');
                $config->cloud->apiSecret = env('CLOUDINARY_API_SECRET');
                $config->url->secure = true;

                $cloudinary = new Cloudinary($config);

                // Get the file path
                $imagePath = $request->file('photo')->getRealPath();

                // Upload to cloudinary
                $uploadResult = $cloudinary->uploadApi()->upload($imagePath, [
                    'folder' => 'profile'
                ]);

                // Store the secure URL
                $profile->photo = $uploadResult['secure_url'];

            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'Photo upload failed: ' . $e->getMessage())
                    ->withInput();
            }
        }

        $profile->save();

        return redirect()->route('admin.profile.index')
            ->with('success', 'Profile created successfully.');
    }

    /**
     * Show the form for editing the specified profile.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\View\View
     */
    public function edit(Profile $profile)
    {
        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Update the specified profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Make photo optional during update
            'cv_link' => 'required|url',
            'skills' => 'nullable|array',
            'skills.*' => 'string|max:100',
        ]);

        $profile->name = $validated['name'];
        $profile->description = $validated['description'];
        $profile->cv_link = $validated['cv_link'];
        $profile->skills = $validated['skills'] ?? [];

        // Upload new photo to Cloudinary if provided
        if ($request->hasFile('photo')) {
            try {
                // Configure Cloudinary directly
                $config = new Configuration();
                $config->cloud->cloudName = env('CLOUDINARY_CLOUD_NAME');
                $config->cloud->apiKey = env('CLOUDINARY_API_KEY');
                $config->cloud->apiSecret = env('CLOUDINARY_API_SECRET');
                $config->url->secure = true;

                $cloudinary = new Cloudinary($config);

                // Get the file path
                $imagePath = $request->file('photo')->getRealPath();

                // Upload to cloudinary
                $uploadResult = $cloudinary->uploadApi()->upload($imagePath, [
                    'folder' => 'profile'
                ]);

                // Store the secure URL
                $profile->photo = $uploadResult['secure_url'];

            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'Photo upload failed: ' . $e->getMessage())
                    ->withInput();
            }
        }

        $profile->save();

        return redirect()->route('admin.profile.index')
            ->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified profile from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Profile $profile)
    {
        // Note: If you want to delete the image from Cloudinary, you would need to
        // extract the public_id from the URL and use Cloudinary::destroy($publicId)

        $profile->delete();

        return redirect()->route('admin.profile.index')
            ->with('success', 'Profile deleted successfully.');
    }
}
