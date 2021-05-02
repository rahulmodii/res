<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RestaurentBooking extends Mailable
{
    use Queueable, SerializesModels;

    public $time,$people;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($time,$people)
    {
        $this->time=$time;
        $this->people=$people;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.restaurent.booking')->with(['time'=>$this->time,'people'=>$this->people]);
    }
}
