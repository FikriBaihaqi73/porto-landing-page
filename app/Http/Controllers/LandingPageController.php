<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\SocialMedia;

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
        $portfolios = Portfolio::latest()->take(3)->get();
        $blogs = Blog::latest()->take(3)->get();
        $socialMedia = SocialMedia::where('is_active', true)->get();

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

    public function portfolioIndex()
{
    $portfolios = Portfolio::latest()->paginate(9);
    return view('portfolio.index', compact('portfolios'));
}

public function blogIndex()
{
    $blogs = Blog::latest()->paginate(9);
    return view('blog.index', compact('blogs'));
}
}
