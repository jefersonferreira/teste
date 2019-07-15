<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class LoginTest extends TestCase
{
    public function testRequiresEmailAndLogin()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."],
                ]
            ]);
    }

    public function testUserLoginsUnsuccessfully()
    {
        $user = factory(User::class)->create([
            'email' => 'testlogin@user.com',
            'password' => bcrypt('teste123'),
        ]);

        $payload = ['email' => 'testlogin@user.com', 'password' => '123teste'];

        $this->json('POST', 'api/login', $payload)
            ->assertStatus(422);
    }

    public function testUserLoginsSuccessfully()
    {
        $user = factory(User::class)->create([
            'email' => 'testlogin@user.com',
            'password' => bcrypt('teste123'),
        ]);

        $payload = ['email' => 'testlogin@user.com', 'password' => 'teste123'];

        $this->json('POST', 'api/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                    'api_token',
                ],
            ]);
    }
}
