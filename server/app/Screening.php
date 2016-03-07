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
    	$this->belongsTo(Movie::class);
    }

    /**
     *
     */
    public function bookings()
    {
    	$this->hasMany(Booking::class);	
    }

    /**
     *
     */
    public function screen()
    {
    	$this->belongsTo(Screen::class);
    }
}
