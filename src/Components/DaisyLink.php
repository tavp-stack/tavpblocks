<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyLink - DaisyUI link component.
 * Uses semantic classes: link, link-primary, etc.
 */
class DaisyLink extends DaisyComponent
{
    public function __construct(
        private string $label = '',
        private string $href = '',
        private string $variant = 'default',
        private bool $hover = true,
    ) {
    }

    public function render(): string
    {
        $classes = ['link'];

        $variantMap = [
            'primary' => 'link-primary',
            'secondary' => 'link-secondary',
            'accent' => 'link-accent',
            'info' => 'link-info',
            'success' => 'link-success',
            'warning' => 'link-warning',
            'error' => 'link-error',
            'hover' => 'link-hover',
            'default' => '',
        ];

        $classes[] = self::variantClass($this->variant, $variantMap);

        if ($this->hover) {
            $classes[] = 'link-hover';
        }

        $classStr = implode(' ', array_filter($classes));

        return '<a href="' . htmlspecialchars($this->href) . '" class="' . $classStr . '">' . htmlspecialchars($this->label) . '</a>';
    }
}
