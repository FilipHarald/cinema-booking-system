<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'password' => bcrypt(str_random(10)),
        'type' => rand(0, 1),
    ];
});

$factory->define(App\Booking::class, function(Faker\Generator $faker) {
	return [
		'email' => $faker->safeEmail,
		'payment_id' => str_random(20),
	];
});

$factory->define(App\Screen::class, function(Faker\Generator $faker) {
	return [
		'name' => $faker->word(),
		//'seats' => factory(Seat::class, rand(10, 20))->create(),
	];
});

$factory->define(App\Seat::class, function(Faker\Generator $faker) {
	return [
	];
});

$factory->define(App\Movie::class, function(Faker\Generator $faker) {
	return [
		"title" => $faker->words(4, true),
		"director" => $faker->name(),
		"duration" => rand(60, 90),
	];
});

$factory->define(App\Screening::class, function(Faker\Generator $faker) {
	return [
		"start_time" => $faker->dateTimeBetween('-1 month', 'now'),
	];
});




