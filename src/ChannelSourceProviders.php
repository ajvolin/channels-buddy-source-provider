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
     * @param string $sourceProviderName
     * @param ChannelSourceProvider $channelSource
     * @return void
     */
    public function registerChannelSourceProvider(string $sourceProviderName,
        ChannelSourceProvider $channelSource): void
    {
        if (!in_array($sourceProviderName, $this->channelSourceProviders)) {
            $this->channelSourceProviders[$sourceProviderName] = $channelSource;
        } else {
            throw new ChannelSourceProviderException(
                "Channel source with name {$sourceProviderName} already exists."
            );
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
        if (in_array($sourceProviderName, $this->channelSourceProviders)) {
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