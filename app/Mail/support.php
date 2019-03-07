<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reading\ReadingPerson;
use App\Books\Book;

class support extends Mailable
{
    use Queueable, SerializesModels;

    public $book;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@books.nlbp.org')
        ->subject('Test send mail.')
        ->view('emails.supports.support');
    }
}
