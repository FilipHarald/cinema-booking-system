<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class AuthenticationTest extends TestCase
{
    // /** @test */
    // public function it_can_be_acquired_with_valid_credentials()
    // {
    //     $email = 'test@example.com';
    //     $password = 'password';

    //     $this->createUser($email, $password);

    //     $this->call('POST', '/auth', [
    //             'email' => $email,
    //             'password' => $password
    //         ])
    //         ->assertResponseStatus(200)
    //         ->seeJson([
    //             'jwt'
    //         ]);
    // }

    // /** @test */
    // public function it_cannot_be_acquired_with_an_invalid_email()
    // {
    //     $email = 'non_existing_user@example.com';
    //     $password = 'password';

    //     $this->call('POST', '/auth', [
    //             'email' => $email,
    //             'password' => $password
    //         ])
    //         ->assertResponseStatus(401)
    //         ->seeJson([
    //             'error' => true
    //         ]);
    // }

    // /** @test */
    // public function it_cannot_be_acquired_with_an_invalid_password()
    // {
    //     $email = 'existing_user@example.com';
    //     $password = 'password';

    //     $this->createUser($email, $password);

    //     $this->call('POST', '/auth', [
    //             'email' => $email,
    //             'password' => 'invalid_password'
    //         ])
    //         ->assertResponseStatus(401)
    //         ->seeJson([
    //             'error' => true
    //         ]);
    // }

    // /**
    //  *
    //  */
    // public function createUser($email, $password)
    // {
    //     factory(User::class)->create([
    //         'email' => $email,
    //         'password' => bcrypt($password),
    //     ]);
    // }
}
