<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Booking;

class BookingsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_can_be_created_by_an_authenticated_user()
    {
        $user = factory(User::class)->create();

        //response = $this->actingAs($user)
        $response = $this->call('POST', '/bookings', [
                "email"=> "test@test.com",
                "payment_id"=> "123asdq23123",
                "screening_id"=> 1,
                "user_id"=> $user->id,
                "seat_ids"=> 200

            ]);

        //print_r($response->content());
        
        $this->assertResponseStatus(201);

        /*
        $this->seeJson([

            ]);
        */

        $json = json_decode($response->getContent());
        
        $this->seeInDatabase('bookings', ['id' => $json->id]);
    }


    /** @test */
    public function it_cannot_be_created_by_an_unauthenticated_user()
    {
        $this->json('POST', '/bookings', [

                "email"=> "test@test.com",
                "payment_id"=> "123asdq23123",
                "screening_id"=> 1,
                
                "seat_ids"=> 200

            ]);

        $this->assertResponseStatus(401);
        
        $this->seeJson([
            'error' => "user not authenticated"
            ]);
    }

    
    /** @test */
    public function it_can_be_removed_by_an_authenticated_user()
    {
        $user = factory(User::class)->create();
        //$screen = factory(Screen::class)->create();
        //$booking = factory(Booking::class)->create();
        $booking = Booking::all()->random(1);



        $this->actingAs($user)
            ->call('DELETE', "/bookings/{$booking->id}")
            ->seeJson([

            ])
            ->dontSeeInDatabase('bookings', ['id' => $booking->id]);
    }

    /** @test */
    public function it_cannot_be_removed_by_an_unauthenticated_user()
    {
        $booking = factory(Booking::class)->create();

        $this->call('DELETE', "/bookings/{$booking->id}")
            ->assertResponseStatus(401)
            ->seeJson([

            ])
            ->seeInDatabase('bookings', ['id' => $booking->id]);
    }

    /** @test */
    public function it_can_be_changed_by_an_authenticated_user()
    {
        $user = factory(User::class)->create();
        $booking = factory(Booking::class)->create();
        $email = "aasdasdasd@example.com";

        $this->actingAs($user)
            ->call('PUT', "/bookings/{$booking->id}", [
                'email' => $email,
            ])
            ->assertResponseStatus(200)
            ->seeJson([

            ])
            ->seeInDatabase('bookings', ['id' => $booking->id, 'email' => $email]);
    }

    /**
     *
     */
    public function it_can_be_viewed_by_an_authenticated_user()
    {
        $user = factory(User::class)->create();
        $booking = factory(Booking::class)->create();

        $this->actingAs($user)
            ->call('GET', "/bookings/{$booking->id}")
            ->assertResponseStatus(200)
            ->seeJson([
                "id" => $booking->id,
                "email" => $booking->email,
            ]);
    }

    
}
