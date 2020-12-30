<?php

namespace ChannelsBuddy\SourceProvider;

use ChannelsBuddy\SourceProvider\ChannelSourceProviders;
use Illuminate\Support\ServiceProvider;

class ChannelsBuddySourceServiceProvider extends ServiceProvider
{
    /**
     * Register the ChannelSourceProviders singleton
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ChannelSourceProviders::class, function($app) {
            return new ChannelSourceProviders;
        });
    }
}