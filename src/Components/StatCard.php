<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class StatCard extends Component
{
    public function __construct(
        private string $label = '',
        private string|int|float $value = 0,
        private string $trend = '',
        private string $trendColor = 'gray',
    ) {
    }

    public function render(): string
    {
        $trendColor = match ($this->trendColor) {
            'green' => 'text-green-600',
            'red' => 'text-red-600',
            default => 'text-gray-500',
        };

        $html = '<div class="rounded-lg bg-white border border-gray-200 p-6">';
        $html .= '<div class="text-sm text-gray-500">' . htmlspecialchars($this->label) . '</div>';
        $html .= '<div class="text-3xl font-bold mt-1">' . htmlspecialchars((string) $this->value) . '</div>';

        if ($this->trend !== '') {
            $html .= '<div class="text-sm mt-1 ' . $trendColor . '">' . htmlspecialchars($this->trend) . '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
