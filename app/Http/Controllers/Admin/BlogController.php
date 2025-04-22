<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;

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
                    'folder' => 'blog'
                ]);

                // Store the secure URL
                $blog->image = $uploadResult['secure_url'];

            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'Image upload failed: ' . $e->getMessage())
                    ->withInput();
            }
        }

        $blog->save();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified blog.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\View\View
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\View\View
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog->title = $request->title;
        $blog->content = $request->content;

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
                    'folder' => 'blog'
                ]);

                // Store the secure URL
                $blog->image = $uploadResult['secure_url'];

            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'Image upload failed: ' . $e->getMessage())
                    ->withInput();
            }
        }

        $blog->save();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified blog from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Blog $blog)
    {
        // Note: If you want to delete the image from Cloudinary, you would need to
        // extract the public_id from the URL and use Cloudinary::destroy($publicId)

        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post deleted successfully.');
    }
}
