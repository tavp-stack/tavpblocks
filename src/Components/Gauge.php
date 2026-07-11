<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * Gauge component — circular progress indicator.
 */
class Gauge extends Component
{
    public function __construct(
        private float $value = 0,
        private float $max = 100,
        private string $label = '',
        private string $color = 'blue',
    ) {
    }

    public function render(): string
    {
        $percent = min(100, max(0, ($this->value / $this->max) * 100));
        $color = match ($this->color) {
            'green' => 'stroke-green-500',
            'red' => 'stroke-red-500',
            'yellow' => 'stroke-yellow-500',
            default => 'stroke-blue-500',
        };

        $circumference = 2 * 3.14159 * 36;
        $offset = $circumference - ($percent / 100 * $circumference);

        $html = '<div class="inline-flex flex-col items-center">';
        $html .= '<svg width="80" height="80" viewBox="0 0 80 80">';
        $html .= '<circle cx="40" cy="40" r="36" fill="none" stroke="#e5e7eb" stroke-width="8"/>';
        $html .= '<circle cx="40" cy="40" r="36" fill="none" class="' . $color . '" stroke-width="8" stroke-linecap="round" stroke-dasharray="' . $circumference . '" stroke-dashoffset="' . $offset . '" transform="rotate(-90 40 40)"/>';
        $html .= '<text x="40" y="45" text-anchor="middle" class="text-sm font-bold fill-gray-900">' . number_format($this->value) . '</text>';
        $html .= '</svg>';

        if ($this->label !== '') {
            $html .= '<div class="text-xs text-gray-500 mt-1">' . htmlspecialchars($this->label) . '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
