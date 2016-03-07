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
        'seat_id',
        'payment_id',
    ];

    /**
     *
     */
    public function screening()
    {
    	$this->belongsTo(Screening::class);
    }

    /**
     *
     */
    public function seat()
    {
        $this->belongsTo(Seat::class);
    }

    /**
     *
     */
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
