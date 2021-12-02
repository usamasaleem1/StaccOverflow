<?php

namespace Tests\Feature;

use App\Question;
use App\User;
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

    /** @test */
    public function a_new_question_can_be_created_by_a_logged_in_user(){
        $this->actingAs(factory(User::class)->create);
        
        $response = $this->post('/post');

        $this->assertCount(1, Question::all());
    }

    /** @test */
    public function any_user_can_see_questions(){
        $this->actingAs(factory(User::class)->create);

        $response = $this->post('/post');

        $this->flushSession();

        $response = $this->get('/view/1')
        ->assertOk();
    }
}