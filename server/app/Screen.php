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
         "name",
    ];

    public $with = ['seats'];

    /**
     *
     */
    public function screenings()
    {
    	return $this->hasMany(Screening::class);
    }

    /**
     *
     */
    public function seats()
    {
    	return $this->hasMany(Seat::class);
    }
}
