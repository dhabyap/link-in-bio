<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    /**
     * Display the specified user's public profile.
     */
    public function show($username)
    {
        $user = \App\Models\User::where('username', $username)->firstOrFail();

        return "Public Profile of: " . $user->name . " (@" . $user->username . ")";
    }
}
