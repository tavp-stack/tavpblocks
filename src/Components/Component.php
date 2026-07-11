<?php

declare(strict_types=1);

namespace Tavp\Blocks;

/**
 * Base class for all TAVPblocks components.
 *
 * Each component renders HTML via a render() method.
 * Components can be used in Volt templates or PHP.
 */
abstract class Component
{
    /**
     * Render the component as HTML.
     */
    abstract public function render(): string;

    /**
     * Get the component name.
     */
    public function name(): string
    {
        return basename(str_replace('\\', '/', static::class));
    }
}
