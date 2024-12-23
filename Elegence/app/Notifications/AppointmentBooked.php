<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AppointmentBooked extends Notification
{
    use Queueable;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Appointment Confirmation')
                    ->greeting('Hello ' . $this->appointment->name . ',')
                    ->line('Your appointment has been successfully booked.')
                    ->line('Details of your appointment:')
                    ->line('Date: ' . $this->appointment->AppDate)
                    ->line('Time: ' . $this->appointment->AppTime)
                    ->line('Stylist: ' . $this->appointment->stylist)
                    ->line('Service(s): ' . $this->appointment->service)
                    ->line('Thank you for booking with us!');
    }
}
