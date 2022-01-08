<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_user_login()
    {
        //Artisan::call('php artisan passport:client --personal',['name'=>'fff']);

        $user = User::factory()->randomUser()->create();

        $data = [
            'email'=>$user->email,
            'password'=>'password'
        ];

        $response = $this->postJson('/api/auth',$data);

        $response->assertOk();
    }

    public function test_user_cannot_login()
    {
        $data = [
            'email'=>'user@mail.com',
            'password'=>'passwor'
        ];

        $response = $this->postJson('/api/auth',$data);

        $response->assertStatus(422);
    }

}
