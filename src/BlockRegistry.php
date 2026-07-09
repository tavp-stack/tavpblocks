<?php

declare(strict_types=1);

namespace Tavp\Blocks;

/**
 * Registry of TAVPblocks UI components.
 *
 * 40+ components spanning form controls, feedback, data display and
 * navigation. Each block renders as a Volt/Alpine snippet. The registry
 * is the single source of truth for what blocks exist and lets modules
 * register additional ones.
 */
class BlockRegistry
{
    private const BLOCKS = [
        // Form controls (BLK-002/003/004)
        'Button', 'Input', 'Select', 'Textarea', 'Toggle', 'Checkbox', 'Radio',
        'FileUpload', 'DatePicker', 'RichEditor',
        // Overlays & feedback
        'Modal', 'Dropdown', 'Toast', 'Alert', 'Skeleton', 'EmptyState', 'ConfirmDialog',
        // Data display
        'Card', 'Badge', 'Avatar', 'Datatable', 'Pagination', 'StatCard', 'Tabs',
        'Accordion', 'Tooltip', 'Breadcrumb', 'Chart', 'ProgressBar',
        // Navigation & layout
        'Navbar', 'Sidebar', 'Footer', 'Menu', 'Stepper', 'Carousel',
        // Auth & misc
        'OtpInput', 'LoginForm', 'LoadingSpinner', 'FormGroup', 'TagInput',
        'ColorPicker', 'RangeSlider', 'NotificationBell', 'SearchBar', 'Timeline',
    ];

    private array $extra = [];

    /**
     * Return all built-in block names.
     */
    public function builtIn(): array
    {
        return self::BLOCKS;
    }

    /**
     * Return built-in blocks plus any registered by modules.
     */
    public function all(): array
    {
        return array_values(array_unique(array_merge(self::BLOCKS, $this->extra)));
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
     * Register a custom block from a module.
     */
    public function register(string $name): void
    {
        if (!$this->has($name)) {
            $this->extra[] = $name;
        }
    }
}
