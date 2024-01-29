<?php

namespace Abduazam\ErrorHandlerBot;

use Illuminate\Support\ServiceProvider;

class ErrorHandlerBotServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/config/error-handler-bot.php' => config_path('error-handler-bot.php'),
        ]);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/error-handler-bot.php', 'error-handler-bot'
        );
    }
}
