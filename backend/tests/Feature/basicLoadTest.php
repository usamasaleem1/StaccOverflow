<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class basicLoadTest extends TestCase
{
    /** @test */
    public function the_home_page_returns_a_successfull_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
