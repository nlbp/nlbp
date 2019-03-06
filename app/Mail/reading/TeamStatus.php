<?php

namespace App\Mail\reading;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reading\ReadingPerson;

class TeamStatus extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ReadingPerson $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'แจ้งการปรับสถานะการจองอ่านหนังสือ';
        return $this->from('support@books.nlbp.org')
        ->subject($subject)
        ->markdown('emails.reading.DetailStatus');
    }
}
