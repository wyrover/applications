<?php

namespace App\Mailers;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppMailer
{

    /**
     * The Laravel Mailer instance.
     *
     * @var Mailer
     */
    protected $mailer;

    /**
     * Admin Email
     *
     * @var string
     */
    protected $adminEmail = 'your-admin-email@domain.com';

    /**
     * The sender of the email.
     *
     * @var string
     */
    protected $from = 'no-reply@domain.com';

    /**
     * The recipient of the email.
     *
     * @var string
     */
    protected $to;

    /**
     * From name or company
     *
     * @var string
     */
    protected $fromName = 'Made Simple';

    /**
     * The view for the email.
     *
     * @var string
     */
    protected $view;

    /**
     * The data associated with the view for the email.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Create a new app mailer instance.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }


    /**
     * Deliver the email.
     *
     * @return void
     */
    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function ($message) {
            $message->from($this->from, $this->fromName)
                ->subject($this->subject)
                ->to($this->to);
        });
    }
}