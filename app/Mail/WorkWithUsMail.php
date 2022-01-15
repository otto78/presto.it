<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WorkWithUsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user_contact; 

    public function __construct($user_contact)
    {
      $this->user_contact= $user_contact;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        

        return $this->from('noreplay@presto.it')->view('Mail/WorkWithUsMail');
    }
}
