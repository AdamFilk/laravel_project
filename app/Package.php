<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;
    protected $fillable = [
    	'codeno','user_id'
    ];

    

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

     public function locations(){
    	return $this->belongsToMany('App\Location', 'packagedetails','packageid', 'location_id')
    		/*->withPivot('qty')*/
    		->withTimestamps();;
    }
}
