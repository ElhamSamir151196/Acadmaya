<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Session_Attach extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    protected $fillable = [
        'session_id', 'uuid', 'cover'
    ];

    public function session () {
        return $this->belongsTo(Session::Class, 'session_id');
    }
    
}
