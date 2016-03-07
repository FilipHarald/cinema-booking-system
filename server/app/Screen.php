<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         
    ];

    /**
     *
     */
    public function screenings()
    {
    	$this->hasMany(Screening::class);
    }

    /**
     *
     */
    public function seats()
    {
    	$this->hasMany(Seat::class);
    }
}
