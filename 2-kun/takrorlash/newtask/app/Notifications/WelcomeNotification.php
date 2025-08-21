<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Xush kelibsiz!')
            ->greeting('Salom ' . $notifiable->name)
            ->line('Siz muvaffaqiyatli ro‘yxatdan o‘tdingiz.')
            ->action('Saytga o‘tish', url('/'))
            ->line('Biz bilan qolganingiz uchun rahmat!');
    }
}
