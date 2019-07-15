<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Collaborator;
use App\Sector;

class CollaboratorTest extends TestCase
{
    public function testRequiresCollaborator()
    {
        $user = factory(User::class)->create([
            'email' => 'login@user.com',
            'password' => bcrypt('teste123'),
        ]);
        $this->actingAs($user, 'api');

        $this->json('POST', '/api/collaborators')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "sector" => ["The sector field is required."],
                    "full_name" => ["The full name field is required."],
                    "birth_date" => ["The birth date field is required."],
                    "salary" => ["The salary field is required."],
                ]
            ]);
    }

    public function testsPostCollaboratorSuccessfully()
    {
        $user = factory(User::class)->create([
            'email' => 'login@user.com',
            'password' => bcrypt('teste123'),
        ]);
        $this->actingAs($user, 'api');

        $sector = factory(Sector::class)->create(['name' => 'Administractive']);
        $payload = [
            'sector' => 'Administractive',
            'full_name' => 'Jhon Miller',
            'birth_date' => '1980-10-10',
            'salary' => '123',
        ];

        $this->json('post', '/api/collaborators', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'sector',
                'full_name',
                'birth_date',
                'salary',
                'created_at',
                'updated_at',
                'status',
            ]);
    }
}
