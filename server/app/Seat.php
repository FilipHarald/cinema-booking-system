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
        'number',
        'row',
        'screen_id',
        //'booking_id', 
    ];

    /**
     *
     */
    public function booking()
    {
    	return $this->belongsToMany(Booking::class);
    }

    /**
     *
     */
    public function screen()
    {
    	return $this->belongsTo(Screen::class);
    }
}
