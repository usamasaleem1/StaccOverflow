<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class questionUnitTest extends TestCase
{
    /** @test */
    public function only_logged_in_users_can_post_questions(){
        $response = $this->get('/post')
        ->assertRedirect('/signin');
    }
}
