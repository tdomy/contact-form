<?php

namespace App\Notifications;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class Contacted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the slack representation of the notification.
     *
     * @param  Contact $contact
     * @return SlackMessage
     */
    public function toSlack(Contact $contact)
    {
        return (new SlackMessage)
            ->success()
            ->content(sprintf("<!channel> New Contact from %s<%s>", $contact->name, $contact->email))
            ->attachment(function ($attachment) use ($contact) {
                $attachment->content($contact->message);
            });
    }
}
