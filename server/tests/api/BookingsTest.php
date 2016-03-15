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

    
}
