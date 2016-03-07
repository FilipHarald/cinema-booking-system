<?php

use Illuminate\Database\Seeder;
use App\Screen;

class ScreensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Screen::class, 3)->create();
    }
}
