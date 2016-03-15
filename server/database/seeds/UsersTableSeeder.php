<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(User::class)->create(['email' => "test@test.com", 'password' => bcrypt("abcdef")]);
        factory(User::class, 3)->create();
    }
}
