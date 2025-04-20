<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // Check if profile already exists
        if (Profile::count() > 0) {
            return redirect()->route('profile.index')
                ->with('error', 'Profile already exists. You can only edit the existing profile.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv_link' => 'nullable|url',
        ]);

        $profile = new Profile();
        $profile->name = $request->name;
        $profile->description = $request->description;
        $profile->cv_link = $request->cv_link;

        if ($request->hasFile('photo')) {
            $profile->photo = $request->file('photo')->store('profile', 'public');
        }

        $profile->save();

        return redirect()->route('admin.profile.index')
            ->with('success', 'Profile created successfully.');
    }

    /**
     * Show the form for editing the profile.
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv_link' => 'nullable|url',
        ]);

        $profile->name = $request->name;
        $profile->description = $request->description;
        $profile->cv_link = $request->cv_link;

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($profile->photo) {
                Storage::disk('public')->delete($profile->photo);
            }

            $profile->photo = $request->file('photo')->store('profile', 'public');
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
        // Delete photo if exists
        if ($profile->photo) {
            Storage::disk('public')->delete($profile->photo);
        }

        $profile->delete();

        return redirect()->route('admin.profile.index')
            ->with('success', 'Profile deleted successfully.');
    }
}
