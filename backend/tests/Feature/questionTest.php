<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class questionTests extends TestCase{

    use RefreshDatabase;

    /** @test */
    public function only_logged_in_users_can_post_questions(){
        $response = $this->get('/post')
        ->assertRedirect('/signin');
    }

    /** @test */
    public function authenticated_users_can_post_questions(){
        $this->actingAs(factory(User::class)->create);
        
        $response = $this->get('/post')
        ->assertOk();
    }
}