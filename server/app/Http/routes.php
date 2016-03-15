<?php

Route::model('bookings', 'App\Booking');

Route::resource('/movies', 'MovieController');
Route::resource('/bookings', 'BookingController', ['only' => ['index', 'store', 'show', 'destroy']]);
Route::resource('/screens', 'ScreenController', ['only' => ['index']]);


Route::get('/', function(){
	return view('welcome');
});