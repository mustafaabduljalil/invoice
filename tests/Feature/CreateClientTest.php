<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Faker\Factory;
use Tests\TestCase;

class CreateClientTest extends TestCase
{
    public function testSuccessfulCreateClient()
    {

        $faker = Factory::create();
        $client = [
            "full_name" => $faker->name(),
            "email" => $faker->email(),
            "mobile" => $faker->phoneNumber(),
            "preferred_communication_channel" => config('communication_channels.EMAIL_COMMUNICATION_CHANNEL')
        ];

        $user = User::inRandomOrder()->first();
        $token = $user->createToken("invoice")->accessToken;

        $this->withHeader('Authorization', 'Bearer ' . $token)
            ->json('POST', 'api/v1/client', $client, ['Accept' => 'application/json'])
            ->assertStatus(201);
    }
}
