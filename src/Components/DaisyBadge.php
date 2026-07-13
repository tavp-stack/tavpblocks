<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyBadge - DaisyUI badge component.
 * Uses semantic classes: badge, badge-primary, badge-secondary, etc.
 */
class DaisyBadge extends DaisyComponent
{
    public function __construct(
        private string $label = '',
        private string $variant = 'default',
        private string $size = 'md',
        private bool $outline = false,
    ) {
    }

    public function render(): string
    {
        $classes = ['badge'];

        $variantMap = [
            'primary' => 'badge-primary',
            'secondary' => 'badge-secondary',
            'accent' => 'badge-accent',
            'ghost' => 'badge-ghost',
            'info' => 'badge-info',
            'success' => 'badge-success',
            'warning' => 'badge-warning',
            'error' => 'badge-error',
            'default' => '',
        ];

        $sizeMap = [
            'xs' => 'badge-xs',
            'sm' => 'badge-sm',
            'md' => '',
            'lg' => 'badge-lg',
        ];

        $classes[] = self::variantClass($this->variant, $variantMap);
        $classes[] = self::sizeClass($this->size, $sizeMap);

        if ($this->outline) {
            $classes[] = 'badge-outline';
        }

        $classStr = implode(' ', array_filter($classes));

        return '<span class="' . $classStr . '">' . htmlspecialchars($this->label) . '</span>';
    }
}
