<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplyToInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $replyContent;

    public function __construct($message, $replyContent)
    {
        $this->message = $message;
        $this->replyContent = $replyContent;
    }

    public function build()
    {
        return $this->subject('Reply to Your Inquiry')
                    ->view('admin.emails.reply_to_inquiry')
                    ->with([
                        'message' => $this->message,
                        'replyContent' => $this->replyContent,
                    ]);
    }
}
