<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Messages\MessageRepository;
use App\Repositories\Messages\IMessageRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Repository
        $this->app->bind(IMessageRepository::class, MessageRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
