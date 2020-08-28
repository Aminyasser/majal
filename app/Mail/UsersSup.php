<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UsersSup extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $pragra;
    // public $email;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$pragra)
    {
        //

        $this->title = $title;
        $this->pragra = $pragra;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Mailer.complete');
    }
}
