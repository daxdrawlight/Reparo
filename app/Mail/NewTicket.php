<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $random_string;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($random_string)
    {
        $this->random_string = $random_string;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.NewTicket')->subject('Novi nalog ' . $this->random_string);
    }
}
