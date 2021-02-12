<?php

namespace ChannelsBuddy\SourceProvider\Models;

use ChannelsBuddy\SourceProvider\Models\BaseModel;
use ChannelsBuddy\SourceProvider\Models\Channel;
use Illuminate\Support\LazyCollection;

/**
 * Class GuideEntry
 * @package ChannelsBuddy\SourceProvider
 *
 */

class GuideEntry extends BaseModel
{
    /**
     * @var Channel
     */
    public Channel $channel;

    /**
     * Yields a LazyCollection of Airing objects
     * 
     * @var LazyCollection
     */
    public LazyCollection $airings;

    /**
     * GuideEntry constructor.
     *
     */
    public function __construct(Channel $channel)
    {
        if (!is_null($channel)) {
            $this->channel = $channel;
        }
    }

    /**
     * Returns the airings LazyCollection
     * 
     * @return LazyCollection
     */
    public function getAirings(): LazyCollection
    {
        return $this->airings;
    }
}
