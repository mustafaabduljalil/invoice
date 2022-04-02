<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    public function testSuccessfulLogin()
    {
        $loginData = ['email' => User::inRandomOrder()->first()->email,'password' => "password"];
        $this->json('POST', 'api/v1/auth/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200);

        $this->assertAuthenticated();
    }
}
