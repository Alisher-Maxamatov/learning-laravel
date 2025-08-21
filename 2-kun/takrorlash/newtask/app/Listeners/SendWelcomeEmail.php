<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\WelcomeNotification;

class SendWelcomeEmail
{
    public function __construct()
    {

    }

    public function handle(UserRegistered $event): void
    {
        Mail::raw('Xush kelibsiz, ' . $event->user->name, function($message) use ($event) {
            $message->to($event->user->email)
                ->subject('Xush kelibsiz!');

            $user = $event->user;
            $user->notify(new WelcomeNotification());
        });
    }
}
