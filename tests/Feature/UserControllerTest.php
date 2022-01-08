<?php

namespace Tests\Feature;

use App\Models\User;
//use Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_user()
    {
        $data = [
            'name'=>'kilo'
        ];

        $user = User::factory()->create();
        $user = User::find($user->id);

        $response = $this->actingAs($user,'api')->putJson("/api/users/$user->id/update",$data);

        $response->assertOk();
    }
}
