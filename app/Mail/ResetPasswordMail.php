<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $User_name;
    protected $password;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password , $name )
    {
        //
        $this->password=$password;
        $this->User_name=$name;
      

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.resetPassword')->with([
            'password' => $this->password,
            'name'     => $this->User_name,
            
        ]);
    }
}
