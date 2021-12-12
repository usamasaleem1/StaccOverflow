<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Question;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class votingTests extends TestCase{
    
    use RefreshDatabase;

    /** @test */
    public function only_author_of_question_can_choose_best_answer(){
        $this->actingAs(factory(User::class)->make([
            'id' => '1'
        ]));
        
        $response = $this->post('/markbestanswer',['question_id' => 55, 'comment_id' => '1'])
        ->assertStatus(401);
    }

    /** @test */
    public function the_author_of_question_can_choose_best_answer(){
        $this->actingAs(factory(User::class)->make([
            'id' => '1'
        ]));
        $response = $this->post('/markbestanswer',['question_id' => 1, 'comment_id' => '1'])
        ->assertStatus(401);
    }

    /** @test */
    public function logged_in_users_can_upvote_a_question(){
        $user = User::factory()
                    ->has(Question::factory())
                    ->create();
        $this->actingAs($user)
             ->visit('/');
        $browser->click('ion-arrow-up-a gray');
        $votes = $browser->value('ion-total');
        $this->assert($votes == '1');
    }

    /** @test */
    public function authenticated_users_can_downvote_a_question(){
        $user = User::factory()
                    ->has(Question::factory())
                    ->create();
        $this->actingAs($user)
             ->visit('/');
        $browser->click('ion-arrow-down-a gray');
        $votes = $browser->value('ion-total');
        $this->assert($votes == '-1');
    }

    /** @test */
    public function authenticated_users_can_select_the_best_answer_for_their_own_questions(){
        $user = User::factory()
                    ->has(Question::factory())
                    ->create();
        $this->actingAs($user)
             ->visit('/view/1');
        $browser->type('content', 'Test answer content \n <code> Test code answer</code>');
        $this->click('button')
             ->click('best_answer_holder');
             $browser->assertPresent('fas fa-star');
    }
}