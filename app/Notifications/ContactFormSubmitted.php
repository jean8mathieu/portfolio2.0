<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class ContactFormSubmitted extends Notification
{
    use Queueable;

    protected $from;
    protected $subject;
    protected $body;

    /**
     * Create a new notification instance.
     *
     * @param $from
     * @param $subject
     * @param $body
     */
    public function __construct($from, $subject, $body)
    {
        $this->from = $from;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->info()
            ->content("Someone submitted a contact form!")
            ->attachment(function ($attachment) {
                $attachment->title($this->subject)->fields([
                   "From" => $this->from,
                   "Body" => $this->body
                ]);
            });
    }
}
