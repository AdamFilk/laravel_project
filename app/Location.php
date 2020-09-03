<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','price','photo','nature'
    ];

     

    public function hotels()
    {
        return $this->hasMany('App\Hotel');
    }

    public function restaurants()
    {
        return $this->hasMany('App\Restaurant');
    }

    public function transportations()
    {
        return $this->hasMany('App\Transportation');
    }
    public function nature()
    {
        return $this->belongsTo('App\Nature','natureid');
    }
    public function originalpackage()
    {
        return $this->hasMany('App\OriginalPackage');
    }

    

    public function packages(){
        return $this->belongsToMany('App\Package', 'packagedetails','package_id', 'location_id')
            /*->withPivot('qty')*/
            ->withTimestamps();;
    }


}
