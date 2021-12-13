<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class BasicLoadTest extends TestCase
{
    /** @test */
    public function the_home_page_returns_a_successfull_response()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function the_login_page_returns_a_successfull_response()
    {
        $response = $this->get('/signin');
        $response->assertStatus(200);
    }

    /** @test */
    public function the_signup_page_returns_a_successfull_response()
    {
        $response = $this->get('/register');
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
