<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $booking;
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
            ->subject(config("app.name") . ' - Booking Notification')
            ->line("Your booking for the event {$this->booking->event->name} has been confirmed.")
            ->line('Booking ID: ' . $this->booking->booking_id)
            ->line('Event Name: ' . $this->booking->event->name)
            ->line('Event Date: ' . $this->booking->event->start_date)
            ->line('Total Tickets: ' . $this->booking->total_tickets)
            ->line('Single Ticket Price: ' . $this->booking->ticket_price)
            ->line('Total Price Paid: ' . $this->booking->amount)
            ->action('View Booking', route("profile.index", ["booking" => true]))
            ->line('Thank you for using our application!');  
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
