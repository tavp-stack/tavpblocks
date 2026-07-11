<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * PieChart component — simple CSS pie chart using conic-gradient.
 */
class PieChart extends Component
{
    /** @var array<int, array{label: string, value: float, color: string}> */
    private array $segments = [];

    public function __construct(
        private string $title = '',
        private int $size = 120,
    ) {
    }

    public function addSegment(string $label, float $value, string $color = 'blue'): self
    {
        $this->segments[] = ['label' => $label, 'value' => $value, 'color' => $color];
        return $this;
    }

    public function render(): string
    {
        if (empty($this->segments)) {
            return '<div class="text-gray-500 text-sm">No data</div>';
        }

        $total = array_sum(array_column($this->segments, 'value'));
        if ($total === 0) {
            $total = 1;
        }

        $colors = [];
        $angle = 0;
        foreach ($this->segments as $segment) {
            $percent = ($segment['value'] / $total) * 100;
            $endAngle = $angle + $percent * 3.6;
            $color = match ($segment['color']) {
                'green' => '#22c55e',
                'red' => '#ef4444',
                'yellow' => '#eab308',
                'purple' => '#a855f7',
                default => '#3b82f6',
            };
            $colors[] = "{$color} {$angle}deg {$endAngle}deg";
            $angle = $endAngle;
        }

        $html = '<div class="inline-flex flex-col items-center">';
        if ($this->title !== '') {
            $html .= '<div class="text-sm font-medium text-gray-700 mb-2">' . htmlspecialchars($this->title) . '</div>';
        }
        $html .= '<div class="rounded-full" style="width: ' . $this->size . 'px; height: ' . $this->size . 'px; background: conic-gradient(' . implode(', ', $colors) . ')"></div>';
        $html .= '<div class="flex flex-wrap gap-2 mt-2">';
        foreach ($this->segments as $segment) {
            $color = match ($segment['color']) {
                'green' => 'bg-green-500',
                'red' => 'bg-red-500',
                'yellow' => 'bg-yellow-500',
                'purple' => 'bg-purple-500',
                default => 'bg-blue-500',
            };
            $html .= '<div class="flex items-center gap-1 text-xs text-gray-600"><div class="w-2 h-2 rounded-full ' . $color . '"></div>' . htmlspecialchars($segment['label']) . '</div>';
        }
        $html .= '</div></div>';

        return $html;
    }
}
