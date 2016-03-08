<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_provide_a_jwt_when_supplied_with_valid_credentials()
    {
        // Given
        // When
        // Then
    }
}
