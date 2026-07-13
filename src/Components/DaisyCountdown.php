<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyCountdown - DaisyUI countdown component.
 * Uses semantic classes: countdown, etc.
 */
class DaisyCountdown extends DaisyComponent
{
    public function __construct(
        private int $value = 0,
        private string $label = '',
        private string $size = 'md',
    ) {
    }

    public function render(): string
    {
        $sizeMap = [
            'xs' => 'text-xs',
            'sm' => 'text-sm',
            'md' => 'text-2xl',
            'lg' => 'text-4xl',
        ];

        $sizeClass = $sizeMap[$this->size] ?? 'text-2xl';

        $html = '';
        if ($this->label !== '') {
            $html .= '<span class="label-text">' . htmlspecialchars($this->label) . '</span>';
        }

        $html .= '<span class="countdown font-mono ' . $sizeClass . '">';
        $html .= '<span style="--value:' . $this->value . ';"></span>';
        $html .= '</span>';

        return $html;
    }
}
