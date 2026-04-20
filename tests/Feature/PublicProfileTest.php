<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Link;
use App\Models\Portfolio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class PublicProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_profile_is_accessible_by_username(): void
    {
        $user = User::factory()->create([
            'username' => 'johndoe',
            'display_name' => 'John Doe',
        ]);

        $response = $this->get('/johndoe');

        $response->assertStatus(200);
        $response->assertSee('John Doe');
    }

    public function test_public_profile_shows_links_and_portfolios(): void
    {
        $user = User::factory()->create(['username' => 'johndoe']);
        
        $link = Link::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Website',
            'is_active' => true,
        ]);

        $portfolio = Portfolio::factory()->create([
            'user_id' => $user->id,
            'title' => 'Project Alpha',
        ]);

        $response = $this->get('/johndoe');

        $response->assertStatus(200);
        $response->assertSee('My Website');
        $response->assertSee('Project Alpha');
    }

    public function test_public_profile_data_is_cached(): void
    {
        $user = User::factory()->create(['username' => 'johndoe']);
        
        // First hit to populate cache
        $this->get('/johndoe');
        
        $this->assertTrue(Cache::has("profile_johndoe"));
    }

    public function test_public_profile_returns_404_if_user_not_found(): void
    {
        $response = $this->get('/nonexistentuser');

        $response->assertStatus(404);
    }
}
