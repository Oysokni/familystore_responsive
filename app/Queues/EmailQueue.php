<?php

namespace App\Queues;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailQueue extends Mailable implements ShouldQueue{
    
    use Queueable, SerializesModels;
    
    /**
     * The number of times the job may be attempted.
     * @var int
     */
    public $tries = 5;
    
    /**
     * The number of seconds the job can run before timing out.
     * @var int
     */
    public $timeout = 60;

    public function __construct($view, $subject = null, $data = [], $attachments = []) 
    {
        $this->view = $view;
        $this->subject = $subject;
        $this->viewData = $data;
        $this->attachments = $attachments;
    }
    
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                ->view($this->view);
    }
    
}

