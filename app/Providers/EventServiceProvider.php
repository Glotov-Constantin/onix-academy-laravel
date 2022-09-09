<?php

namespace App\Providers;

use App\Events\UserRegistered;
use App\Listeners\UserRegisteredListener;
use App\Models\Post;
use App\Models\User;
use App\Observers\PostObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
//        []
//        UserRegistered::class => [
//            UserRegisteredListener::class
//        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(
            UserRegistered::class,
            [UserRegisteredListener::class, 'handle']
        );
        Post::observe(new PostObserver());
        User::saving(function ($user){
            $user->full_name = $user->first_name . ' ' . $user->last_name;
        });
        User::observe( new UserObserver());
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
