<?php

namespace ChannelsBuddy\SourceProvider;

use ChannelsBuddy\SourceProvider\ChannelSourceProvider;
use ChannelsBuddy\SourceProvider\Exceptions\ChannelSourceProviderException;

class ChannelSourceProviders
{
    /**
     * Array of registered channel source providers
     * 
     * @var ChannelSourceProvider[]
     */
    private array $channelSourceProviders = [];

    /**
     * Registers a channel source provider
     *
     * @param ChannelSourceProvider $channelSource
     * @return void
     */
    public function registerChannelSourceProvider(
        ChannelSourceProvider $channelSource): void
    {
        try {
            if (!array_key_exists($channelSource->getSourceName(), $this->channelSourceProviders)) {
                $this->channelSourceProviders[$channelSource->getSourceName()] = $channelSource;
            } else {
                throw new ChannelSourceProviderException(
                    "Channel source with name {$channelSource->getSourceName()} already exists."
                );
            }
        } catch (ChannelSourceProviderException $e) {
            report($e);
        }
    }

    /**
     * Returns the requested channel source provider
     *
     * @param string $sourceProviderName
     * @return ChannelSourceProvider
     */
    public function getChannelSourceProvider(
        string $sourceProviderName): ChannelSourceProvider
    {
        if (array_key_exists($sourceProviderName, $this->channelSourceProviders)) {
            return $this->channelSourceProviders[$sourceProviderName];
        } else {
            throw new ChannelSourceProviderException(
                "Channel source with name {$sourceProviderName} does not exist."
            );
        }
    }
    
    /**
     * Returns all registered channel source providers
     *
     * @return ChannelSourceProvider[]
     */
    public function getChannelSourceProviders(): array
    {
        return $this->channelSourceProviders;
    }
}