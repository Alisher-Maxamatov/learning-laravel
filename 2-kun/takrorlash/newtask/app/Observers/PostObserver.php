<?php

namespace App\Observers;

use App\Models\Post;
use App\Notifications\PostPublishedNotification;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post)
    {
        $author = $post->user; //post yaratuvchisini olish
        $author->notify(new PostPublishedNotification($post));
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        if ($post->wasChanged('title')){
            $author = $post->user;
            $author->notify(new PostPublishedNotification($post, true));
        };
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
