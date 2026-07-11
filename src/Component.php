<?php

declare(strict_types=1);

namespace Tavp\Blocks;

/**
 * Base class for all TAVPblocks components.
 */
abstract class Component
{
    abstract public function render(): string;

    public function name(): string
    {
        return basename(str_replace('\\', '/', static::class));
    }
}
