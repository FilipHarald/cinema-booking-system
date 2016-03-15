<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\BookingRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Screening;
use App\Seat;
use App\User;

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
        if ($request->user_id == null || !User::find($request->user_id))
            return response()->json(["error" => "user not authenticated"], 401);
        
        $booking = new Booking;

        $booking->email = $request->email;
        $booking->payment_id = $request->payment_id;

        $screening = Screening::find($request->screening_id);
        //$seats = $screening->screen->seat->where("id", $request->input('seat_ids'));
        //$seats = Seat::where("id", $request->seat_ids);
        $user = User::find($request->user_id);

        $booking->screening()->associate($screening);   
        $booking->user()->associate($user);

        $booking->save();

        $booking->seats()->attach($request->seat_ids);
        
        return response()->json(Booking::find($booking->id), 201);
        

        //return response()->json([], 201);
    }

    public function update(Booking $booking) {
        $request = Request::instance();

        $content = json_decode($request->getContent());

        if ($content == null)
            return response()->json(["Error" => "Unable to find update parameters"]);

        $array = array();

        foreach ($content as $key => $value) {
            $array[$key] = $value;
        }

        $booking->update($array);

        $booking->save();

        return response()->json(Booking::find($booking->id), 200);
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
    public function destroy(Booking $booking)
    {
        $booking->delete();
        

        return response()->json(['status', 'deleted'], 200);
    }
}
