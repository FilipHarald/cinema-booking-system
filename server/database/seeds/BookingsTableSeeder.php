<?php

use Illuminate\Database\Seeder;
use App\Booking;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i = 0; $i < 5; $i++) {
	        factory(Booking::class)
	        	->create(['screening_id' => rand(1, 10)])
	        	->each(function($booking) {

	        		$seats = $booking->screening->screen->seats->random(1);

	        		$booking->seats()->attach($seats);

	        	});
    	}
    }
}
