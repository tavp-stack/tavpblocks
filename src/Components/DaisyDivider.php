<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyDivider - DaisyUI divider component.
 * Uses semantic classes: divider, divider-primary, etc.
 */
class DaisyDivider extends DaisyComponent
{
    public function __construct(
        private string $label = '',
        private string $direction = 'horizontal',
        private string $variant = 'default',
    ) {
    }

    public function render(): string
    {
        $classes = ['divider'];

        $directionMap = [
            'horizontal' => '',
            'vertical' => 'divider-vertical',
        ];

        $variantMap = [
            'primary' => 'divider-primary',
            'secondary' => 'divider-secondary',
            'accent' => 'divider-accent',
            'default' => '',
        ];

        $classes[] = $directionMap[$this->direction] ?? '';
        $classes[] = self::variantClass($this->variant, $variantMap);

        $classStr = implode(' ', array_filter($classes));

        $html = '<div class="' . $classStr . '">';
        if ($this->label !== '') {
            $html .= htmlspecialchars($this->label);
        }
        $html .= '</div>';

        return $html;
    }
}
