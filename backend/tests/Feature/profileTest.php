<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class profileTests extends TestCase{

    use RefreshDatabase;
    //use DatabaseMigrations;

    /** @test */
    public function any_user_can_see_profiles_from_registered_users(){
        $user = User::factory()->make([]);
        $response = $this->get('/profile/1')
        ->assertOk();
    }

    /** @test */
    public function any_new_user_can_register(){
        $this->visit('/')
             ->click('Login')
             ->click('Sign up');
        $browser->type('email', 'taylor@laravel.com');
        $browser->type('name', 'Taylor');
        $browser->type('password', 'asdf1234');
        $browser->type('confirm_password', 'asdf1234');
        $this->click('Sign up')
             ->assertRedirect('/');
    }

    /** @test */
    public function any_user_can_sign_in_with_their_email_and_password(){
        $this->visit('/')
             ->click('Login');
        $browser->type('email', 'taylor@laravel.com');
        $browser->type('password', 'asdf1234');
        $this->click('Sign in')
             ->assertRedirect('/');
    }
}