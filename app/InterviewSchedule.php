<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewSchedule extends Model
{
    protected $dates = ['schedule_date','created_at'];

    public function jobApplication(){
        return $this->belongsTo(JobApplication::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(ScheduleComments::class);
    }

    public function employee(){
        return $this->hasMany(InterviewScheduleEmployee::class);
    }

    public function employeeData($userId){
        return InterviewScheduleEmployee::where('user_id', $userId)->where('interview_schedule_id', $this->id)->first();
    }
}
