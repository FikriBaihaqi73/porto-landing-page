<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\Profile;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display the landing page with all sections.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $profile = Profile::first();
        $portfolios = Portfolio::latest()->take(6)->get();
        $blogs = Blog::latest()->take(6)->get();
        $socialMedia = SocialMedia::all();

        return view('welcome', compact('profile', 'portfolios', 'blogs', 'socialMedia'));
    }

    /**
     * Display the specified portfolio.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\View\View
     */
    public function showPortfolio(Portfolio $portfolio)
    {
        $relatedPortfolios = Portfolio::where('id', '!=', $portfolio->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('portfolio.show', compact('portfolio', 'relatedPortfolios'));
    }

    /**
     * Display the specified blog post.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\View\View
     */
    public function showBlog(Blog $blog)
    {
        $relatedBlogs = Blog::where('id', '!=', $blog->id)
            ->inRandomOrder()
            ->take(2)
            ->get();

        return view('blog.show', compact('blog', 'relatedBlogs'));
    }
}
