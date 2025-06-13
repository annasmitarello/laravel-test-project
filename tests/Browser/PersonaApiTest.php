<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Persona;
use App\Models\User;

class PersonaApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_persona()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson('/personas', [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
        ]);

        $response->assertStatus(302); // redirige a index normalmente
        $this->assertDatabaseHas('personas', ['nombre' => 'Juan']);
    }
}
