<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleComments extends Model
{
    protected $dates = ['created_at'];
    protected $table = 'interview_schedule_comments';

    public function jobApplication(){
        return $this->belongsTo(InterviewSchedule::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
