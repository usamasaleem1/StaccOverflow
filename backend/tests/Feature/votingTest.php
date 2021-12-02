<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class votingTests extends TestCase{
    private $question;

    public function setup(){
        parent::setup();
        $this->question = factory(Question::class)->create;
    }

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
}