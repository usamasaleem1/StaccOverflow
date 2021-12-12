<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\User;
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
        $this->actingAs(factory(User::class)->create)
             ->visit('/post');
        $browser->type('title', 'Test question Title')
                ->type('content', 'Test question content \n <code> Test code </code>')
                ->select('label_id');
        $this->click('button')
             ->assertRedirect('/');

    }

    /** @test */
    public function authenticated_users_can_answer_questions(){
        $user = User::factory()
                    ->has(Question::factory())
                    ->create();
        $this->actingAs(factory(User::class)->create)
             ->visit('/view/1');
        $browser->type('content', 'Test answer content \n <code> Test code answer</code>');
        $this->click('button')
             ->assertDatabaseCount('question_comments', 1);

    }

    /** @test */
    public function a_new_question_can_be_created_by_a_logged_in_user(){
        $this->actingAs(factory(User::class)->create);
        
        $response = $this->post('/post');

        $this->assertCount(1, Question::all());
    }

    /** @test */
    public function any_user_can_see_questions(){
        $user = User::factory()
                    ->has(Question::factory()->count(3))
                    ->create();
        $this->visit('/view/1')
             ->assertOk();
    }

    /** @test */
    public function any_user_can_see_questions_filtered_by_label(){
        $this->actingAs(factory(User::class)->create)
             ->visit('/post');
        $browser->type('title', 'Test question Title')
                ->type('content', 'Test question content \n <code> Test code </code>')
                ->select('label_id', 1);
        $this->click('button')
             ->visit('/search/tag/1');
        $browser->assertPresent('card');
    }
}