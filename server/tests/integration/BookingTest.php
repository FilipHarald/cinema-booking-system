<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Screening;
use App\Booking;

class BookingTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_only_return_seats_that_are_not_already_booked()
    {
        $user = factory(User::class)->create();
        $screening = Screening::all()->random(1);
        $seats = $screening->screen->seats->random(2);


        # Change this to work with Seats
        $booking = factory(Booking::class)->create(['screening_id' => $screening->id, 'user_id' => $user->id]);
        /*
        $booking = new Booking;
        $booking->email = "ASD@ASD.com"
        $booking->screening_id = $screening->id;
        $booking->user_id = $user->id;

        $booking->save(); */

        $booking->seats()->attach($seats);


        $seats = $screening->getRemainingSeats();
        $taken = $seats->filter(function ($seat) {
            return $seat->row == 8 && $seat->number == 6;
        });

        $this->assertEmpty($taken);
    }
}
