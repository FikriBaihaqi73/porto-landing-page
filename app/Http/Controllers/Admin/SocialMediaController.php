<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the social media links.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $socialMedia = SocialMedia::all();
        return view('admin.social-media.index', compact('socialMedia'));
    }

    /**
     * Show the form for creating a new social media link.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.social-media.create');
    }

    /**
     * Store a newly created social media link in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'link' => 'required|url',
            'icon' => 'required|string|max:255',
        ]);

        $socialMedia = new SocialMedia();
        $socialMedia->platform = $request->platform;
        $socialMedia->link = $request->link;
        $socialMedia->icon = $request->icon;
        $socialMedia->save();

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Social media link created successfully.');
    }

    /**
     * Show the form for editing the specified social media link.
     *
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\View\View
     */
    public function edit(SocialMedia $socialMedia)
    {
        return view('admin.social-media.edit', compact('socialMedia'));
    }

    /**
     * Update the specified social media link in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, SocialMedia $socialMedia)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'link' => 'required|url',
            'icon' => 'required|string|max:255',
        ]);

        $socialMedia->platform = $request->platform;
        $socialMedia->link = $request->link;
        $socialMedia->icon = $request->icon;
        $socialMedia->save();

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Social media link updated successfully.');
    }

    /**
     * Remove the specified social media link from storage.
     *
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SocialMedia $socialMedia)
    {
        $socialMedia->delete();

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Social media link deleted successfully.');
    }
}
