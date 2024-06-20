<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AfricGEM extends Mailable
{
    use Queueable, SerializesModels;

    public $send;
    public $image_url;

    public function __construct($send, $image_url)
    {
        $this->send = $send;
        $this->image_url = $image_url;
    }

    public function build()
    {
        return $this->view('emails.sendmails')
                    ->with([
                        'message_head' => $this->send->message_head,
                        'message_body' => $this->send->message_body,
                        'message_ending' => $this->send->message_ending,
                        'image_url' => $this->image_url,
                    ]);
    }
}
