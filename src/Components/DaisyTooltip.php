<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyTooltip - DaisyUI tooltip component.
 * Uses semantic classes: tooltip, tooltip-primary, etc.
 */
class DaisyTooltip extends DaisyComponent
{
    public function __construct(
        private string $tip = '',
        private string $content = '',
        private string $position = 'top',
        private string $variant = 'default',
    ) {
    }

    public function render(): string
    {
        $classes = ['tooltip'];

        $positionMap = [
            'top' => 'tooltip-top',
            'bottom' => 'tooltip-bottom',
            'left' => 'tooltip-left',
            'right' => 'tooltip-right',
        ];

        $variantMap = [
            'primary' => 'tooltip-primary',
            'secondary' => 'tooltip-secondary',
            'accent' => 'tooltip-accent',
            'info' => 'tooltip-info',
            'success' => 'tooltip-success',
            'warning' => 'tooltip-warning',
            'error' => 'tooltip-error',
            'default' => '',
        ];

        $classes[] = $positionMap[$this->position] ?? 'tooltip-top';
        $classes[] = self::variantClass($this->variant, $variantMap);

        $classStr = implode(' ', array_filter($classes));

        return '<div class="' . $classStr . '" data-tip="' . htmlspecialchars($this->tip) . '">' . $this->content . '</div>';
    }
}
