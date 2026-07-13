<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyLoading - DaisyUI loading component.
 * Uses semantic classes: loading, loading-spinner, loading-dots, etc.
 */
class DaisyLoading extends DaisyComponent
{
    public function __construct(
        private string $type = 'spinner',
        private string $size = 'md',
        private string $variant = 'default',
    ) {
    }

    public function render(): string
    {
        $classes = ['loading'];

        $typeMap = [
            'spinner' => 'loading-spinner',
            'dots' => 'loading-dots',
            'ring' => 'loading-ring',
            'ball' => 'loading-ball',
            'bars' => 'loading-bars',
            'infinity' => 'loading-infinity',
        ];

        $sizeMap = [
            'xs' => 'loading-xs',
            'sm' => 'loading-sm',
            'md' => '',
            'lg' => 'loading-lg',
        ];

        $variantMap = [
            'primary' => 'text-primary',
            'secondary' => 'text-secondary',
            'accent' => 'text-accent',
            'info' => 'text-info',
            'success' => 'text-success',
            'warning' => 'text-warning',
            'error' => 'text-error',
            'default' => '',
        ];

        $classes[] = $typeMap[$this->type] ?? 'loading-spinner';
        $classes[] = self::sizeClass($this->size, $sizeMap);
        $classes[] = self::variantClass($this->variant, $variantMap);

        $classStr = implode(' ', array_filter($classes));

        return '<span class="' . $classStr . '"></span>';
    }
}
