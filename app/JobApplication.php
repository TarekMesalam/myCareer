<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class JobApplication extends Model
{
    use Notifiable;
    
    protected $appends = ['resume_url', 'photo_url'];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function status()
    {
        return $this->belongsTo(ApplicationStatus::class, 'status_id');
    }

    public function schedule()
    {
        return $this->hasOne(InterviewSchedule::class)->latest();
    }

    public function getResumeUrlAttribute()
    {
        return asset_url('resumes/' . $this->resume);
    }

    public function getPhotoUrlAttribute()
    {
        if (is_null($this->photo)) {
            return asset('avatar.png');
        }
        return asset_url('candidate-photos/' . $this->photo);
    }
}
