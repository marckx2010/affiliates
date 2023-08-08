<?php


// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class DashboardTest extends TestCase
{

    /** @test */
    public function test_homepage(): void
    {
        $this->get('/')->assertOk();
    }

    /** @test */
    public function test_homepage_message(): void
    {
        $response = $this->get('/');

        $response->assertSee("Welcome");
    }
}
