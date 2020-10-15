<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $otp;
    protected $viewName;
    protected $username;
    protected $template;

    /**
     * Create a new message instance.
     *
     * @return void
     * @author Prakash.j <prakash.j@digient.in>
     */
    public function __construct(string $otp, string $view, string $username = null, string $template = null)
    {
        $this->otp      = $otp;
        $this->viewName = $view;
        $this->username = $username;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @author Prakash.j <prakash.j@digient.in>
     */
    public function build()
    {
        return $this->view('mail.'.$this->viewName,[
                            'otp'       => $this->otp,
                            'username'  => $this->username,
                            'template'  => $this->template,
        ]);
    }
}
