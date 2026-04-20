<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class DeploymentTest extends TestCase
{
    public function test_deployment_setup_requires_token(): void
    {
        Config::set('app.deployment_token', 'secret-token');

        $response = $this->get('/deploy/setup?action=optimize');

        $response->assertStatus(403);
    }

    public function test_deployment_setup_fails_with_wrong_token(): void
    {
        Config::set('app.deployment_token', 'secret-token');

        $response = $this->get('/deploy/setup?action=optimize&token=wrong-token');

        $response->assertStatus(403);
    }

    public function test_deployment_setup_succeeds_with_correct_token(): void
    {
        Config::set('app.deployment_token', 'secret-token');

        // We only test 'optimize' to avoid side effects like migrations in simple tests
        $response = $this->get('/deploy/setup?action=optimize&token=secret-token');

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'action' => 'optimize'
        ]);
    }

    public function test_deployment_setup_returns_error_for_invalid_action(): void
    {
        Config::set('app.deployment_token', 'secret-token');

        $response = $this->get('/deploy/setup?action=invalid-action&token=secret-token');

        $response->assertStatus(400);
        $response->assertJson([
            'status' => 'error'
        ]);
    }
}
