<?php

namespace App\Http\Controllers;

use App\Seat;
use App\User;
use App\Booking;
use App\Screening;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['bookings' => Booking::all()];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        if (! $request->user_id || ! $user = User::find($request->user_id)) {
            return response()->json(['error' => 'user not authenticated'], 401);
        }

        $booking = Booking::create([
            'email' => $request->email,
            'payment_id' => $request->payment_id,
            'screening_id' => $request->screening_id,
            'user_id' => $request->user_id,
        ]);

        $booking->seats()->attach($request->seat_ids);

        return response()->json($booking->fresh(), 201);
    }

    /**
     * Update a booking in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking) {
        $booking->update($request->all());
        return response()->json($booking, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return ['booking' => $booking];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json(['status' => 'deleted'], 200);
    }
}
