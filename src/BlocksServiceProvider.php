<?php

declare(strict_types=1);

namespace Tavp\Blocks;

use Tavp\Core\Module\ServiceProvider;

/**
 * Service provider for TAVPblocks UI components.
 *
 * Registers the block registry into the app container
 * and makes components available to all views.
 */
class BlocksServiceProvider implements ServiceProvider
{
    public function register(): void
    {
        app()->bind(BlockRegistry::class, fn () => new BlockRegistry());
    }

    public function boot(): void {}

    public function loadRoutes(): void {}

    public function loadMigrations(): void {}

    public function loadViews(): void {}
}
