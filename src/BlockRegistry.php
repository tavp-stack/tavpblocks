<?php

declare(strict_types=1);

namespace Tavp\Blocks;

/**
 * Registry of TAVPblocks UI components.
 *
 * Each block has a PHP class that renders HTML.
 * Components can be used in Volt templates or PHP.
 */
class BlockRegistry
{
    /** @var array<string, class-string<Component>> */
    private const BLOCKS = [
        'Button' => Components\Button::class,
        'Card' => Components\Card::class,
        'Alert' => Components\Alert::class,
        'Badge' => Components\Badge::class,
        'Modal' => Components\Modal::class,
        'Tabs' => Components\Tabs::class,
        'Pagination' => Components\Pagination::class,
        'StatCard' => Components\StatCard::class,
        'Datatable' => Components\Datatable::class,
        'Skeleton' => Components\Skeleton::class,
        'Breadcrumb' => Components\Breadcrumb::class,
    ];

    private array $extra = [];

    /**
     * Return all built-in block names.
     *
     * @return string[]
     */
    public function builtIn(): array
    {
        return array_keys(self::BLOCKS);
    }

    /**
     * Return built-in blocks plus any registered by modules.
     *
     * @return string[]
     */
    public function all(): array
    {
        return array_values(array_unique(array_merge(array_keys(self::BLOCKS), array_keys($this->extra))));
    }

    public function count(): int
    {
        return count($this->all());
    }

    public function has(string $name): bool
    {
        return in_array($name, $this->all(), true);
    }

    /**
     * Get the class for a block.
     */
    public function getClass(string $name): ?string
    {
        return self::BLOCKS[$name] ?? $this->extra[$name] ?? null;
    }

    /**
     * Create a block instance.
     */
    public function make(string $name, array $props = []): ?Component
    {
        $class = $this->getClass($name);

        if ($class === null || !class_exists($class)) {
            return null;
        }

        return new $class(...$props);
    }

    /**
     * Register a custom block from a module.
     *
     * @param class-string<Component> $class
     */
    public function register(string $name, string $class): void
    {
        if (!$this->has($name)) {
            $this->extra[$name] = $class;
        }
    }
}
