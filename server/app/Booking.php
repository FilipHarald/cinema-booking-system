<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 
        'screening_id',
        //'seat_id',
        'payment_id',
    ];

    public $with = ['screening.movie', 'seats'];

    /**
     *
     */
    public function screening()
    {
    	return $this->belongsTo(Screening::class);
    }

    /**
     *
     */
    public function seats()
    {
        return $this->belongsToMany(Seat::class);
    }

    /**
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
