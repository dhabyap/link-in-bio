<?php

namespace Database\Factories;

use App\Models\Link;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    protected $model = Link::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->words(3, true),
            'url' => $this->faker->url(),
            'icon' => 'fas fa-link',
            'order' => 0,
            'is_active' => true,
        ];
    }
}
