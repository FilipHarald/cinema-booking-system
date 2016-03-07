<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'director', 
        'duration',
    ];

    public function screenings() 
    {
    	$this->hasMany(Screening::class);
    }
}
