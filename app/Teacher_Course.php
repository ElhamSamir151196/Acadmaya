<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Teacher_Course extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    protected $fillable = [
        'teacher_id', 'course_id', 'created_by' , 'still_teach'
    ];
    public function user () {
        return $this->belongsTo(User::Class, 'teacher_id');
    }
    public function course () {
        return $this->belongsTo(Course::Class, 'course_id');
    }
    
}
