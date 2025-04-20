<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('image')) {
            $portfolio->image = $request->file('image')->store('portfolios', 'public');
        }

        $portfolio->save();

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio project created successfully.');
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

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $portfolio->image = $request->file('image')->store('portfolios', 'public');
        }

        $portfolio->save();

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio project updated successfully.');
    }

    /**
     * Remove the specified portfolio from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Portfolio $portfolio)
    {
        // Delete image if exists
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio project deleted successfully.');
    }
}
