<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialMedia = SocialMedia::all();
        return view('admin.social-media.index', compact('socialMedia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social-media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon' => 'required|string|max:255',
            'is_active' => 'sometimes|boolean',
        ]);

        SocialMedia::create($validated);

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Social media link added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMedia $socialMedium)
    {
        return view('admin.social-media.edit', compact('socialMedium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialMedia $socialMedium)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon' => 'required|string|max:255',
            'is_active' => 'sometimes|boolean',
        ]);

        $socialMedium->update($validated);

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Social media link updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $socialMedium)
    {
        $socialMedium->delete();

        // Buat pengkondisian ketika gagal redirect withError('error message')

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Social media link deleted successfully.');
    }
}
