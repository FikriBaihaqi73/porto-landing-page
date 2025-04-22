<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the portfolios.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new portfolio.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created portfolio in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->project_link = $request->project_link;

        // Upload image to Cloudinary if provided
        if ($request->hasFile('image')) {
            try {
                // Configure Cloudinary directly
                $config = new Configuration();
                $config->cloud->cloudName = env('CLOUDINARY_CLOUD_NAME');
                $config->cloud->apiKey = env('CLOUDINARY_API_KEY');
                $config->cloud->apiSecret = env('CLOUDINARY_API_SECRET');
                $config->url->secure = true;

                $cloudinary = new Cloudinary($config);

                // Get the file path
                $imagePath = $request->file('image')->getRealPath();

                // Upload to cloudinary
                $uploadResult = $cloudinary->uploadApi()->upload($imagePath, [
                    'folder' => 'portfolio'
                ]);

                // Store the secure URL
                $portfolio->image = $uploadResult['secure_url'];

            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'Image upload failed: ' . $e->getMessage())
                    ->withInput();
            }
        }

        $portfolio->save();

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio project created successfully.');
    }

    /**
     * Update the specified portfolio in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->project_link = $request->project_link;

        // Upload new image to Cloudinary if provided
        if ($request->hasFile('image')) {
            try {
                // Configure Cloudinary directly
                $config = new Configuration();
                $config->cloud->cloudName = env('CLOUDINARY_CLOUD_NAME');
                $config->cloud->apiKey = env('CLOUDINARY_API_KEY');
                $config->cloud->apiSecret = env('CLOUDINARY_API_SECRET');
                $config->url->secure = true;

                $cloudinary = new Cloudinary($config);

                // Get the file path
                $imagePath = $request->file('image')->getRealPath();

                // Upload to cloudinary
                $uploadResult = $cloudinary->uploadApi()->upload($imagePath, [
                    'folder' => 'portfolio'
                ]);

                // Store the secure URL
                $portfolio->image = $uploadResult['secure_url'];

            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'Image upload failed: ' . $e->getMessage())
                    ->withInput();
            }
        }

        $portfolio->save();

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio project updated successfully.');
    }

    /**
     * Display the specified portfolio.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\View\View
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified portfolio.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\View\View
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Remove the specified portfolio from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Portfolio $portfolio)
    {
        // Note: If you want to delete the image from Cloudinary, you would need to
        // extract the public_id from the URL and use Cloudinary::destroy($publicId)

        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio project deleted successfully.');
    }
}
