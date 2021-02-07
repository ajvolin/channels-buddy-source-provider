<?php

namespace ChannelsBuddy\SourceProvider;

use ChannelsBuddy\SourceProvider\ChannelSourceProvider;
use ChannelsBuddy\SourceProvider\Exceptions\ChannelSourceProviderException;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class ChannelSourceProviders implements Arrayable, Jsonable
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
                ksort($this->channelSourceProviders);
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

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $arr = ['providers' => []];

        foreach ($this->channelSourceProviders as $k => $v) {
            $arr['providers'][$k] = $v->toArray();
        }

        return $arr;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0): string
    {
        return json_encode($this->toArray(), $options);
    }
}