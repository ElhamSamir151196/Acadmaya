<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Admin_ContactUs extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    protected $fillable = [
        'contactUs_id', 'admin_id', 'is_seen'
    ];

    
    public function user () {
        return $this->hasMany(User::class, 'admin_id');
    }
    
    public function contactUs () {
        return $this->hasMany(ContactUs::class, 'contactUs_id');
    }
}
