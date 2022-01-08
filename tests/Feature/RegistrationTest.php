<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    

    public function test_user_registration()
    {
        $data = [
            'name'=>'joshusa',
            'email'=>'j@mail.com',
            'password'=>'password',
            'phone'=>'09022',
        ];

        $response = $this->postJson('/api/register',$data);

        $response->assertOk();
    }
}
