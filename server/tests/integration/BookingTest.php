<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Screening;

class BookingTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_only_return_seats_that_are_not_already_booked()
    {
        $screening = factory(Screening::class)->create();

        # Change this to work with Seats
        factory(Booking::class)->create([
            'screening_id' => $screening->id,
            'row' => 8,
            'number' => 6
        ]);

        $seats = $screening->getRemainingSeats();
        $taken = $seats->filter(function ($seat) {
            return $seat->row == 8 && $seat->number == 6;
        });

        $this->assertEmpty($taken);
    }
}
