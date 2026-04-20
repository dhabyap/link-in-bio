<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Auth::user()->portfolios()->orderBy('order')->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'external_api_url' => 'nullable|url',
            'thumbnail' => 'nullable|image|max:2048',
            'order' => 'required|integer',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail_path'] = $request->file('thumbnail')->store('portfolios', 'public');
        }

        $portfolio = Auth::user()->portfolios()->create($validated);

        // Invalidate public profile cache for this user
        Cache::forget("profile_{$portfolio->user->username}");

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $this->authorizeUser($portfolio);
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $this->authorizeUser($portfolio);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'external_api_url' => 'nullable|url',
            'thumbnail' => 'nullable|image|max:2048',
            'order' => 'required|integer',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail_path'] = $request->file('thumbnail')->store('portfolios', 'public');
        }

        $portfolio->update($validated);

        // Invalidate public profile cache for this user
        Cache::forget("profile_{$portfolio->user->username}");

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $this->authorizeUser($portfolio);
        $portfolio->delete();

        // Invalidate public profile cache for this user
        Cache::forget("profile_{$portfolio->user->username}");

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio deleted successfully.');
    }

    /**
     * Helper to ensure the user owns the portfolio.
     */
    protected function authorizeUser(Portfolio $portfolio)
    {
        if ($portfolio->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
