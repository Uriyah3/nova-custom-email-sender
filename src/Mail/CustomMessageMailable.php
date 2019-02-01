<?php

namespace Dniccum\CustomEmailSender\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomMessageMailable extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var string $subject
     */
    public $subject;

    /**
     * @var string $message
     */
    public $message;

    /**
     * Create a new message instance.
     *
     * @param string $subject
     * @param string $message
     * @return void
     */
    public function __construct(string $subject, string $message)
    {
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view = config('novaemailsender.template');

        if (!view()->exists($this->view)) {
            \View::addLocation(base_path('vendor/dniccum/custom-email-sender/resources/views'));
            $view = 'email';
        }

        return $this->markdown($view)
            ->subject($this->subject)
            ->from(config('novaemailsender.from.address'), config('novaemailsender.from.name'))
            ->with([
                'content' => $this->message,
                'salutation' => config('novaemailsender.from.address')
            ]);
    }
}