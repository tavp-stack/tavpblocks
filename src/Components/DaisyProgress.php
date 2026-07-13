<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyProgress - DaisyUI progress component.
 * Uses semantic classes: progress, progress-primary, etc.
 */
class DaisyProgress extends DaisyComponent
{
    public function __construct(
        private string $label = '',
        private float $value = 0,
        private float $max = 100,
        private string $variant = 'default',
        private string $size = 'md',
    ) {
    }

    public function render(): string
    {
        $classes = ['progress'];

        $variantMap = [
            'primary' => 'progress-primary',
            'secondary' => 'progress-secondary',
            'accent' => 'progress-accent',
            'info' => 'progress-info',
            'success' => 'progress-success',
            'warning' => 'progress-warning',
            'error' => 'progress-error',
            'default' => '',
        ];

        $sizeMap = [
            'xs' => 'progress-xs',
            'sm' => 'progress-sm',
            'md' => '',
            'lg' => 'progress-lg',
        ];

        $classes[] = self::variantClass($this->variant, $variantMap);
        $classes[] = self::sizeClass($this->size, $sizeMap);

        $classStr = implode(' ', array_filter($classes));
        $percent = ($this->value / $this->max) * 100;

        $html = '';

        if ($this->label !== '') {
            $html .= '<label class="label"><span class="label-text">' . htmlspecialchars($this->label) . '</span></label>';
        }

        $html .= '<progress class="' . $classStr . '" value="' . $this->value . '" max="' . $this->max . '"></progress>';

        return $html;
    }
}
