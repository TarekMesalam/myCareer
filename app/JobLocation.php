<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobLocation extends Model
{
    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class,'location_id','id');
    }
}
