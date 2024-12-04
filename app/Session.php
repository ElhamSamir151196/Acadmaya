<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Session extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    protected $fillable = [
        'description', 'created_by', 'course_id','title' 
    ];
    
    public function user () {
        return $this->belongsTo(User::Class, 'created_by');
    }

   

    public function course () {
        return $this->belongsTo(Course::Class, 'course_id');
    }

    public function session_ataches () {
        return $this->hasMany(Session_Attach::class, 'session_id');
    }

   

}
