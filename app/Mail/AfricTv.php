<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AfricTv extends Mailable
{
    use Queueable, SerializesModels;

    public $send;

    public function __construct($send)
    {
        $this->send = $send;
    }

    public function build()
    {
        return $this->view('emails.sendmails')
                    ->with([
                        'title' => $this->send->title,
                        'message_head' => $this->send->message_head,
                        'message_body' => $this->send->message_body,
                        'message_ending' => $this->send->message_ending,
                        'attachments' => $this->send->attachments,
                    ]);
    }
}
