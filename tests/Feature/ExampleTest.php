<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_cient_error()
    {
        $response = $this->post('/users', ['name' => 'Sally']);

        $response->assertStatus(302);
    }

    public function test_the_application_create_user()
    {
        $response = $this->post('/users', ['name' => 'Daniil Olshev', 'email' => 'Sally@mail.ru', 'notes' => 'note']);

        $response->assertStatus(302);
    }
}
