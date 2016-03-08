<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Screening;
use App\Seat;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return [
            "bookings" => $bookings
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $booking = new Booking;

        $booking->email = $request->email;
        $booking->payment_id = $request->payment_id;

        $screening = Screening::find($request->screening_id);
        //$seats = $screening->screen->seat->where("id", $request->input('seat_ids'));
        $seats = Seat::where("id", $request->seat_ids);

        $booking->screening->associate($screening);
        $booking->seats->associate($seats);

        $booking->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        
        return [
            "booking" => $booking
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = false;
        $booking = Booking::find($id);

        if ($booking->id == $id) {
            $booking->delete();
            $deleted = true;
        }

        return [
            "deleted" => $deleted
        ];
    }
}