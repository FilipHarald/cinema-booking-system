<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   	    $this->call(UsersTableSeeder::class);  
        $this->call(ScreensTableSeeder::class);
        $this->call(SeatsTableSeeder::class);
        $this->call(MoviesTableSeeder::class);
        $this->call(ScreeningsTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        
    }
}
