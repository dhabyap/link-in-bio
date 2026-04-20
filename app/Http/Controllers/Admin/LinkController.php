<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Auth::user()->links()->orderBy('order')->get();
        return view('admin.links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'icon' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $link = Auth::user()->links()->create($validated);

        // Invalidate public profile cache for this user
        Cache::forget("profile_{$link->user->username}");

        return redirect()->route('admin.links.index')->with('success', 'Link created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        $this->authorizeUser($link);
        return view('admin.links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        $this->authorizeUser($link);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'icon' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $link->update($validated);

        // Invalidate public profile cache for this user
        Cache::forget("profile_{$link->user->username}");

        return redirect()->route('admin.links.index')->with('success', 'Link updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $this->authorizeUser($link);
        $link->delete();

        // Invalidate public profile cache for this user
        Cache::forget("profile_{$link->user->username}");

        return redirect()->route('admin.links.index')->with('success', 'Link deleted successfully.');
    }

    /**
     * Helper to ensure the user owns the link.
     */
    protected function authorizeUser(Link $link)
    {
        if ($link->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
