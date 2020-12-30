<?php

namespace ChannelsBuddy\SourceProvider;

use ChannelsBuddy\SourceProvider\Contracts\ChannelSource;

class ChannelSourceProvider
{
    /**
     * @var string
     */
    private string $sourceName;
    
    /**
     * @var string
     */
    private string $channelSourceServiceClass;

    /**
     * @var string
     */
    private string $displayName;

    /**
     * @var bool
     */
    private bool $providesGuide;
    
    /**
     * @var bool
     */
    private bool $guideIsChunkable;
    
    /**
     * @var ?int
     */
    private ?int $maxGuideDuration;
    
    /**
     * @var ?int
     */
    private ?int $maxGuideChunkSize;

    /**
     * @var ChannelSource
     */
    private ChannelSource $sourceService;

    /**
     * ChannelSourceProvider constructor.
     * @param string $sourceName The name of the source
     * @param string $channelSourceServiceClass The name of the class implementing the ChannelSource contract
     * @param string $displayName The display name for the source
     * @param bool $providesGuide Indicates that the source provides a guide
     * @param bool $guideIsChunkable Indicates that the guide can be chunk loaded
     * @param ?int $maxGuideDuration The max duration of guide data that can be loaded, if chunkable
     * @param ?int $maxGuideChunkSize The max chunk size of guide data that can be loaded at one time, if chunkable
     */
    public function __construct(string $sourceName,
                                string $channelSourceServiceClass,
                                string $displayName,
                                bool $providesGuide,
                                bool $guideIsChunkable,
                                ?int $maxGuideDuration = null,
                                ?int $maxGuideChunkSize = null)
    {
        $this->sourceName = $sourceName;
        $this->channelSourceServiceClass = $channelSourceServiceClass;
        $this->displayName = $displayName;
        $this->providesGuide = $providesGuide;
        $this->guideIsChunkable = $guideIsChunkable;
        $this->maxGuideDuration = $maxGuideDuration;
        $this->maxGuideChunkSize = $maxGuideChunkSize;
    }

    /**
     * Returns an instantiated ChannelSource
     *
     * @return ChannelSource
     */
    public function getChannelSourceService(): ChannelSource
    {
        if (!isset($this->sourceService)) {
            $this->sourceService = new $this->channelSourceServiceClass;
        }
         
        return $this->sourceService;
    }

    /**
     * Returns the name for the channel source
     *
     * @return string
     */
    public function getSourceName(): string
    {
        return $this->sourceName;
    }

    /**
     * Returns the display name for the channel source
     *
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * Returns the providesGuide indicator
     *
     * @return boolean
     */
    public function providesGuide(): bool
    {
        return $this->providesGuide;
    }
    
    /**
     * Returns the guideIsChunkable indicator
     *
     * @return boolean
     */
    public function guideIsChunkable(): bool
    {
        return $this->guideIsChunkable;
    }

    /**
     * Returns the max guide duration, if set
     *
     * @return integer|null
     */
    public function getMaxGuideDuration(): ?int
    {
        return $this->maxGuideDuration;
    }

    /**
     * Returns the max guide chunk size, if set
     *
     * @return integer|null
     */
    public function getMaxGuideChunkSize(): ?int
    {
        return $this->maxGuideChunkSize;
    }
}