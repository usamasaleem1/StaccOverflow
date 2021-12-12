<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class basicLoadTest extends TestCase
{

    use RefreshDatabase;
    //use DatabaseMigrations;

    /** @test */
    public function the_home_page_returns_a_successfull_response()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function the_login_button_leads_to_the_signin_page()
    {
        $this->visit('/')
             ->click('Login')
             ->seePageIs('/signin');
    }
}
