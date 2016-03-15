<?php

Route::model('bookings', 'App\Booking');

Route::get('/', function() { return view('welcome'); });

Route::resource('/movies', 'MovieController');
Route::resource('/screens', 'ScreenController', ['only' => ['index']]);
Route::resource('/bookings', 'BookingController', [
    'only' => [
        'index', 'store', 'show', 'destroy', 'update'
    ]
]);
