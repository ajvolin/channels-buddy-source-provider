<?php

namespace ChannelsBuddy\SourceProvider\Models;

use Illuminate\Support\LazyCollection;

/**
 * Class Channels
 * @package ChannelsBuddy\SourceProvider
 *
 */

class Channels
{
    /**
     * Yields a LazyCollection of Channel objects
     * 
     * @var LazyCollection
     */
    public LazyCollection $channels;

    /**
     * Channels constructor.
     *
     * @param array $attributes Initialize the channel with the provided attributes.
     */
    public function __construct(LazyCollection $channels)
    {
        $this->channels = $channels;
    }

    /**
     * Returns the channels LazyCollection
     * 
     * @return LazyCollection
     */
    public function getChannels(): LazyCollection
    {
        return $this->channels;
    }
}
