<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'row',
        'screen_id',
        'booking_id', 
    ];

    /**
     *
     */
    public function booking()
    {
    	$this->belongsTo(Booking::class);
    }

    /**
     *
     */
    public function screen()
    {
    	$this->belongsTo(Screen::class);
    }
}
