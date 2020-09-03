<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nature extends Model
{
    use SoftDeletes;
     protected $fillable = [
    	'name'
    ];

     public function location()
    {
        return $this->hasMany('App\Location');
    }
}
