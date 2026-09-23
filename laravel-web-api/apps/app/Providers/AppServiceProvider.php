<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade; // Import the Blade facade
use Illuminate\Support\Facades\Event; // Import the Event facade
use Illuminate\Mail\Events\MessageSending; // Import the MessageSending event

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Shared Breeze components live in the auth domain folder
        // (resources/views/auth/components). Register it as the anonymous
        // component path so <x-input-label>, <x-nav-link>, ... keep resolving.
        Blade::anonymousComponentPath(resource_path('views/auth/components'));

        // Listen to every outgoing email right before it sends
        Event::listen(MessageSending::class, function (MessageSending $event) {

            // Add the BCC address if it exists in your .env file
            $bccAddress = env('MAIL_GLOBAL_BCC');
            if ($bccAddress) {
                $event->message->addBcc($bccAddress);
            }
        });
    }
}
