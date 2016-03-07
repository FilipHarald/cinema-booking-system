<?php

use Illuminate\Database\Seeder;
use App\Screening;

class ScreeningsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i = 0; $i < 10; $i++) {
        	factory(Screening::class)->create(['movie_id' => rand(1,5), 'screen_id' => rand(1, 3)]);
    	}
    }
}
