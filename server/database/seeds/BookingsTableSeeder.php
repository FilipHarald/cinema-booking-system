<?php

use Illuminate\Database\Seeder;
use App\Booking;
use App\User;

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
    		/*
	        factory(Booking::class)
	        	->create(['screening_id' => rand(1, 10)])
	        	->each(function($booking) {

	        		$seats = $booking->screening->screen->seats->random(1);

	        		$booking->seats()->attach($seats);

	        	});*/
			//$user = User::orderBy('RANDOM()')->get();
			$user = User::all()->random(1);

			$user->bookings()->save(factory(Booking::class)->create(['screening_id' => rand(1, 10), 'user_id' => rand(1,5)]));
    	}
    }
}
