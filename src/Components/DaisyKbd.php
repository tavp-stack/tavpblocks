<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyKbd - DaisyUI kbd (keyboard) component.
 * Uses semantic classes: kbd, kbd-sm, kbd-lg, etc.
 */
class DaisyKbd extends DaisyComponent
{
    public function __construct(
        private string $label = '',
        private string $size = 'md',
    ) {
    }

    public function render(): string
    {
        $sizeMap = [
            'xs' => 'kbd-xs',
            'sm' => 'kbd-sm',
            'md' => '',
            'lg' => 'kbd-lg',
        ];

        $sizeClass = $sizeMap[$this->size] ?? '';

        return '<kbd class="kbd ' . $sizeClass . '">' . htmlspecialchars($this->label) . '</kbd>';
    }
}
