<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;
    protected $fillable = [
    	'userid'
    ];

     public function users()
    {
    	return $this->belongsTo('App\User');
    }
}
