<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendLog extends Mailable
{
    use Queueable, SerializesModels;

    public $first_col;
    public $second_column;

    public function __construct($first_col, $second_column)
    {
        $this->first_col = $first_col;
        $this->second_column = $second_column;
    }

    public function build()
    {
        return $this->view('mail.sendLog')->subject('[Notification TTMng]');
    }
}
