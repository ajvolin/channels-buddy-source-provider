<?php

namespace ChannelsBuddy\SourceProvider\ServiceProviders;

use ChannelsBuddy\SourceProvider\ChannelSourceProviders;
use Illuminate\Support\ServiceProvider;

class ChannelsBuddySourceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ChannelSourceProviders::class, function($app) {
            return new ChannelSourceProviders;
        });
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