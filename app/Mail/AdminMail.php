<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $postdetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $postdetails)
    {
        $this->details = $details;
        $this->postdetails = $postdetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Test')
                    ->view('emails.admin_mail');
    }
}
