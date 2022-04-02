<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Faker\Factory;
use Tests\TestCase;

class CreateClientInvoiceTest extends TestCase
{
    public function testSuccessfulCreateClientInvoice()
    {
        $faker = Factory::create();
        $clientInvoice = [
            "full_name" => $faker->name(),
            "email" => $faker->email(),
            "mobile" => $faker->phoneNumber(),
            "amount" => (string)$faker->randomFloat(),
            "due_date" => $faker->date(),
            "preferred_communication_channel" => config('communication_channels.EMAIL_COMMUNICATION_CHANNEL')
        ];

        $client = Client::create($clientInvoice);
        $clientInvoice['client_id'] = $client->id;

        $user = User::inRandomOrder()->first();
        $token = $user->createToken("invoice")->accessToken;

        $this->withHeader('Authorization', 'Bearer ' . $token)
            ->json('POST', 'api/v1/client-invoice', $clientInvoice, ['Accept' => 'application/json'])
            ->assertStatus(201);
    }
}
