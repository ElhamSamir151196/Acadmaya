<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    protected $fillable = [
        'description', 'created_by', 'name'
    ];

    public function user () {
        return $this->belongsTo(User::Class, 'created_by');
    }

    public function sessions () {
        return $this->hasMany(Session::class, 'course_id');
    }
    
}
