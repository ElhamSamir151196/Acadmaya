<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $User_name;
    protected $password;
    protected $Category;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password , $name , $Category)
    {
        //
        $this->password=$password;
        $this->User_name=$name;
        $this->Category=$Category;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('emails.welcome');
        return $this->markdown('emails.welcome')->with([
            'password' => $this->password,
            'name'     => $this->User_name,
            'Category' => $this->Category
        ]);
    }
}
