<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendVerif extends Mailable
{
    use Queueable, SerializesModels;

    public $first_col;
    public $code;

    public function __construct($first_col, $code)
    {
        $this->first_col = $first_col;
        $this->code = $code;
    }

    public function build()
    {
        return $this->view('mail.sendVerif')->subject('[Notification Verif TTMng]');
    }
}
