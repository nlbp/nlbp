<?php

namespace App\Mail\reading;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reading\ReadingPerson;

class detail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $reading;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ReadingPerson $reading)
    {
        $this->reading = $reading;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'ระบบแจ้งข้อมูลการจองอ่านหนังสือเสียงของห้องสมุด';
        return $this->from('support@books.nlbp.org')
        ->subject($subject)
        ->markdown('emails.reading.detail');
    }
}
