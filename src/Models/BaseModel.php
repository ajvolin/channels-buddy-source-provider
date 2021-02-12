<?php

namespace ChannelsBuddy\SourceProvider\Models;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use ReflectionObject;
use ReflectionProperty;

/**
 * BaseModel
 * @package ChannelsBuddy\SourceProvider
 *
 */

class BaseModel implements Arrayable, Jsonable
{
    /**
     * Convert the object to an array.
     *
     * @return array
     */
    final public function toArray(): array
    {
        $arr = [];
        $props = (new ReflectionObject($this))->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($props as $prop) {
            $propName = $prop->getName();
            if (isset($this->{$propName})) {
                $arr[$propName] = $this->{$propName};
            } else {
                $arr[$propName] = null;
            }
        }

        ksort($arr);

        return $arr;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    final public function toJson($options = 0): string
    {
        return json_encode($this->toArray(), $options);
    }
}