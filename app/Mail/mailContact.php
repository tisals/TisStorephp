<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailContact extends Mailable
{
    use Queueable, SerializesModels;
    protected $information;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    
    public function __construct($information)
    {
        $this->information = $information;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contact.notification')
                    ->with([
                        "information" => $this->information,
                    ]);
    }
}

