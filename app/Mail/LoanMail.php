<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoanMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $body;
    public function __construct($body)
    {
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('emails.LoanMail',$this->body);
		
		return $this->from($address = $this->body['fromemail'], $name = $this->body['fromname'])
                ->subject($this->body['emailsubject'])
                ->markdown('emails.LoanMail',$this->body)
				->attach(asset($this->body['pdf_file']), ['mime' => 'application/pdf']);
				
    }
}
