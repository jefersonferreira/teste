<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Sector;

class SectorTest extends TestCase
{
    public function testRequiresSector()
    {
        $user = factory(User::class)->create([
            'email' => 'login@user.com',
            'password' => bcrypt('teste123'),
        ]);
        $this->actingAs($user, 'api');

        $this->json('POST', '/api/sectors')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                ]
            ]);
    }

    public function testsPostSectorSuccessfully()
    {
        $user = factory(User::class)->create([
            'email' => 'login@user.com',
            'password' => bcrypt('teste123'),
        ]);
        $this->actingAs($user, 'api');

        $payload = [
            'name' => 'Administractive'
        ];

        $this->json('post', '/api/sectors', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'name'
            ]);
    }
}
