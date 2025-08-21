<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostPublishedNotification extends Notification
{
    use Queueable;

    public $post;
    public $isUpdated;
    public function __construct(Post $post, $isUpdated = false)
    {
        $this->post = $post;
        $this->isUpdated = $isUpdated;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $subject = $this->isUpdated ? 'Post yangilandi' : 'Yangi post yaratildi';
        return (new MailMessage)
            ->subject($subject)
            ->line("Sarlavha: {this->post->title}")
            ->line("Matn: {this->post->body}")
            ->action('Postni korish', url("/posts/{this->post->id}"));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
