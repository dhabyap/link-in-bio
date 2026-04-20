<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PublicProfileController extends Controller
{
    /**
     * Display the specified user's public profile.
     */
    public function show($username)
    {
        // Cache profile data for 30 minutes to reduce database hits
        $profileData = Cache::remember("profile_{$username}", 1800, function () use ($username) {
            $user = User::where('username', $username)->firstOrFail();

            return [
                'user' => $user,
                'links' => $user->links()->where('is_active', true)->orderBy('order')->get(),
                'portfolios' => $user->portfolios()->orderBy('order')->get(),
            ];
        });

        $user = $profileData['user'];
        $links = $profileData['links'];
        $portfolios = $profileData['portfolios'];

        // Fetch external API data for portfolios (server-side, heavily cached)
        $apiData = [];
        foreach ($portfolios as $portfolio) {
            if ($portfolio->external_api_url) {
                $apiData[$portfolio->id] = Cache::remember(
                    "portfolio_api_{$portfolio->id}",
                    3600, // cache for 1 hour
                    function () use ($portfolio) {
                        try {
                            $response = Http::timeout(5)->get($portfolio->external_api_url);
                            if ($response->successful()) {
                                return $response->json();
                            }
                        } catch (\Exception $e) {
                            // Silently fail — return null if API is unreachable
                        }
                        return null;
                    }
                );
            }
        }

        return view('public.profile', compact('user', 'links', 'portfolios', 'apiData'));
    }
}
