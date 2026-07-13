<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyRadialProgress - DaisyUI radial progress component.
 * Uses semantic classes: radial-progress, text-primary, etc.
 */
class DaisyRadialProgress extends DaisyComponent
{
    public function __construct(
        private float $value = 0,
        private float $max = 100,
        private string $size = 'md',
        private string $thickness = '4px',
        private string $variant = 'default',
    ) {
    }

    public function render(): string
    {
        $sizeMap = [
            'xs' => 'w-12',
            'sm' => 'w-16',
            'md' => 'w-24',
            'lg' => 'w-32',
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

        $sizeClass = $sizeMap[$this->size] ?? 'w-24';
        $variantClass = $variantMap[$this->variant] ?? '';
        $percent = ($this->value / $this->max) * 100;

        $html = '<div class="radial-progress ' . $variantClass . ' ' . $sizeClass . '" style="--value:' . $percent . '; --thickness:' . $this->thickness . ';" role="progressbar">';
        $html .= round($percent) . '%';
        $html .= '</div>';

        return $html;
    }
}
