<?php

namespace App\Providers;

use App\Models\Post;
use App\Observers\PostObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \App\Events\UserRegistered::class => [
            \App\Listeners\SendWelcomeEmail::class,
        ],
    ];

    public function boot(): void
    {
        parent::boot();
        Post::observe(PostObserver::class);
    }
}
