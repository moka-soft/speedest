<?php

namespace Tests\Speedest;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RunnerTests extends TestCase
{
    use RefreshDatabase;

    public function test_if_runner_can_be_create()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);
    }
}
