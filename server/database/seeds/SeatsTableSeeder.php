<?php

use Illuminate\Database\Seeder;
use App\Seat;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$rows = rand(5, 10);
    	$seats_per_row = rand(10, 20);
    	for ($row = 0; $row < $rows; $row++) {
    		for ($seat = 0; $seat < $seats_per_row; $seat++) {
    			factory(Seat::class)->create(['number' => ($row * $seats_per_row) + $seat, 'row' => $row, 'screen_id' => rand(1, 3)]);
    		}
    	}
        
    }
}
