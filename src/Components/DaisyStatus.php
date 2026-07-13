<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyStatus - DaisyUI status component.
 * Uses semantic classes: status, status-primary, etc.
 */
class DaisyStatus extends DaisyComponent
{
    public function __construct(
        private string $variant = 'default',
        private string $size = 'md',
    ) {
    }

    public function render(): string
    {
        $classes = ['status'];

        $variantMap = [
            'primary' => 'status-primary',
            'secondary' => 'status-secondary',
            'accent' => 'status-accent',
            'info' => 'status-info',
            'success' => 'status-success',
            'warning' => 'status-warning',
            'error' => 'status-error',
            'default' => '',
        ];

        $sizeMap = [
            'xs' => 'status-xs',
            'sm' => 'status-sm',
            'md' => '',
            'lg' => 'status-lg',
        ];

        $classes[] = self::variantClass($this->variant, $variantMap);
        $classes[] = self::sizeClass($this->size, $sizeMap);

        $classStr = implode(' ', array_filter($classes));

        return '<span class="' . $classStr . '"></span>';
    }
}
