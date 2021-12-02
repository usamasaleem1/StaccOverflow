<?php

namespace Tests\Feature;

use App\Question;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class profileTests extends TestCase{

    use RefreshDatabase;

    /** @test */
    public function any_user_can_see_profiles_from_registered_users(){
        $user = factory(User::class)->make(['id'=>'1']);
        $response = $this->get('/profile/1')
        ->assertOk();
    }
}