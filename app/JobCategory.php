<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $guarded = ['id'];

    public function skills(){
        return $this->hasMany(Skill::class, 'category_id');
    }

    public function getPhotoUrlAttribute()
    {
        if (is_null($this->photo)) {
            return asset('logo-not-found.png');
        }
        return asset_url('category-photos/' . $this->photo);
    }
    public function jobs(){
        return $this->hasMany(Job::class,'category_id','id');
    }
}
