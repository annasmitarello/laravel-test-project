<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserTest extends TestCase
{
       public function test_get_users_list()
    {
        User::factory()->create();
        User::factory()->count(2)->create();

        $response = $this-> get('/users');
        $response->assertStatus(200);
        $response->assertJsonStructure([['id','name','email','email_verified_at','created_at','updated_at' ]]);

        $response-> assertJsonCount(3);
    }

    public function test_get_users_details()
    {
        $user = User::factory()->create(['name' => 'paula']);

        $response = $this-> get('/users/ ' . $user->id);
        $response->assertStatus(200);
        $response->assertJsonStructure(['id','name','email', 'email_verified_at','created_at','updated_at']);
        $response-> assertJsonFragment(['name' => 'paula']);
    }

    public function test_non_existing_user()
    {
        $response = $this-> get('/users/555');
        $response->assertStatus(404);

    }
} 