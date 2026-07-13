<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyRating - DaisyUI rating component.
 * Uses semantic classes: rating, rating-half, etc.
 */
class DaisyRating extends DaisyComponent
{
    public function __construct(
        private string $name = '',
        private int $value = 0,
        private int $max = 5,
        private string $size = 'md',
        private bool $half = false,
        private bool $disabled = false,
    ) {
    }

    public function render(): string
    {
        $sizeMap = [
            'xs' => 'rating-xs',
            'sm' => 'rating-sm',
            'md' => '',
            'lg' => 'rating-lg',
        ];

        $sizeClass = $sizeMap[$this->size] ?? '';

        $html = '<div class="rating ' . $sizeClass . '">';

        if ($this->half) {
            $html .= '<div class="rating-half">';
        }

        for ($i = $this->max; $i >= 1; $i--) {
            $checked = $i === $this->value ? ' checked' : '';
            $disabled = $this->disabled ? ' disabled' : '';
            $html .= '<input type="radio" name="' . htmlspecialchars($this->name) . '" class="mask mask-star-2 bg-orange-400" value="' . $i . '"' . $checked . $disabled . ' />';
        }

        if ($this->half) {
            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
