<?php

namespace ChannelsBuddy\SourceProvider;

class ChannelSourceProvider
{
    private string $displayName;
    private string $channelSourceClass;

    private bool $providesGuide;
    private bool $guideIsChunkable;
    private ?int $maxGuideDuration;
    private ?int $maxGuideChunkSize;

    /**
     * ChannelSourceProvider constructor.
     *
     * @param string $channelSourceClass The name of the class implementing the ChannelSource contract
     * @param string $displayName The display name for the source
     * @param bool $providesGuide Indicates that the source provides a guide
     * @param bool $guideIsChunkable Indicates that the guide can be chunk loaded
     * @param ?int $maxGuideDuration The max duration of guide data that can be loaded, if chunkable
     * @param ?int $maxGuideChunkSize The max chunk size of guide data that can be loaded at one time, if chunkable
     */
    public function __construct(string $channelSourceClass,
                                string $displayName,
                                bool $providesGuide,
                                bool $guideIsChunkable,
                                ?int $maxGuideDuration = null,
                                ?int $maxGuideChunkSize = null)
    {
        $this->channelSourceClass = $channelSourceClass;
        $this->displayName = $displayName;
        $this->providesGuide = $providesGuide;
        $this->guideIsChunkable = $guideIsChunkable;
        $this->maxGuideDuration = $maxGuideDuration;
        $this->maxGuideChunkSize = $maxGuideChunkSize;
    }

    /**
     * Returns the channel source class name
     *
     * @return string
     */
    public function getChannelSourceClass(): string
    {
        return $this->channelSourceClass;
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