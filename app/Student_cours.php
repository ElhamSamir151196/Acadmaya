<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student_cours extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    protected $fillable = [
        'student_id', 'course_id', 'created_by'
    ];
    public function user () {
        return $this->belongsTo(User::Class, 'student_id');
    }
    public function course () {
        return $this->belongsTo(Course::Class, 'course_id');
    }
    
}
