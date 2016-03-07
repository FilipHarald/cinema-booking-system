<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'movie_id', 
        'start_time', 
        'screen_id',
    ];

    /**
     *
     */
    public function movie()
    {
    	return $this->belongsTo(Movie::class);
    }

    /**
     *
     */
    public function bookings()
    {
    	return $this->hasMany(Booking::class);	
    }

    /**
     *
     */
    public function screen()
    {
    	return $this->belongsTo(Screen::class);
    }
}
