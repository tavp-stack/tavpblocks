<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisySwap - DaisyUI swap component.
 * Uses semantic classes: swap, swap-on, swap-off, etc.
 */
class DaisySwap extends DaisyComponent
{
    public function __construct(
        private string $onContent = '',
        private string $offContent = '',
        private string $type = 'rotate',
        private bool $active = false,
    ) {
    }

    public function render(): string
    {
        $classes = ['swap'];

        $typeMap = [
            'rotate' => 'swap-rotate',
            'flip' => 'swap-flip',
            'none' => '',
        ];

        $classes[] = $typeMap[$this->type] ?? 'swap-rotate';

        if ($this->active) {
            $classes[] = 'swap-active';
        }

        $classStr = implode(' ', array_filter($classes));

        $html = '<label class="' . $classStr . '">';
        $html .= '<input type="checkbox"' . ($this->active ? ' checked' : '') . ' />';
        $html .= '<div class="swap-on">' . $this->onContent . '</div>';
        $html .= '<div class="swap-off">' . $this->offContent . '</div>';
        $html .= '</label>';

        return $html;
    }
}
