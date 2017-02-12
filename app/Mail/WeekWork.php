<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WeekWork extends Mailable
{
    use Queueable, SerializesModels;

    protected $results;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($results)
    {
        $this->results = $results;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('yuea19921@126.com')
            ->subject('周报')
            ->view('emails.weekwork')
            ->with([
                'data' => $this->results
            ]);
    }
}
