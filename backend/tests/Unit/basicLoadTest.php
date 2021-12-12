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
}
