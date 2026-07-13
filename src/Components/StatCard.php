<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class StatCard extends Component
{
    /**
     * @param string|int|float $value
     * @param array<int|float> $sparkline
     */
    public function __construct(
        private string $label = '',
        private string|int|float $value = 0,
        private string $trend = '',
        private string $trendColor = 'gray',
        private string $icon = '',
        private string $color = 'brand',
        private array $sparkline = [],
        private string $theme = 'auto',
    ) {
    }

    public function render(): string
    {
        $forceDark = $this->theme === 'dark';
        $forceLight = $this->theme === 'light';

        $shell = match (true) {
            $forceDark => 'rounded-xl bg-gray-900 border border-gray-800 p-5',
            $forceLight => 'rounded-xl bg-white border border-gray-200 p-5 shadow-sm',
            default => 'rounded-xl bg-white border border-gray-200 p-5 shadow-sm dark:bg-gray-900 dark:border-gray-800',
        };

        $labelCls = match (true) {
            $forceDark => 'text-sm text-gray-400',
            $forceLight => 'text-sm text-gray-500',
            default => 'text-sm text-gray-500 dark:text-gray-400',
        };
        $valueCls = match (true) {
            $forceDark => 'text-2xl font-bold text-white mt-1',
            $forceLight => 'text-2xl font-bold text-gray-900 mt-1',
            default => 'text-2xl font-bold text-gray-900 mt-1 dark:text-white',
        };

        $accent = $this->accent($forceDark, $forceLight);

        $iconHtml = '';
        if ($this->icon !== '') {
            $iconHtml = '<div class="flex h-11 w-11 items-center justify-center rounded-lg ' . $accent['tile'] . ' ' . $accent['icon'] . ' text-xl shrink-0">'
                . $this->icon
                . '</div>';
        }

        $trendHtml = '';
        if ($this->trend !== '') {
            $trendCls = match ($this->trendColor) {
                'green' => 'text-green-600 dark:text-green-400',
                'red' => 'text-red-600 dark:text-red-400',
                'yellow' => 'text-yellow-600 dark:text-yellow-400',
                default => 'text-gray-500 dark:text-gray-400',
            };
            $trendHtml = '<div class="text-sm mt-1 ' . $trendCls . '">' . htmlspecialchars($this->trend) . '</div>';
        }

        $sparkHtml = '';
        if ($this->sparkline !== []) {
            $sparkHtml = '<div class="mt-4">' . $this->sparkline() . '</div>';
        }

        $html = '<div class="' . $shell . '">';
        $html .= '<div class="flex items-start justify-between gap-3">';
        $html .= '<div class="min-w-0">';
        $html .= '<div class="' . $labelCls . '">' . htmlspecialchars($this->label) . '</div>';
        $html .= '<div class="' . $valueCls . '">' . htmlspecialchars((string) $this->value) . '</div>';
        $html .= $trendHtml;
        $html .= '</div>';
        $html .= $iconHtml;
        $html .= '</div>';
        $html .= $sparkHtml;
        $html .= '</div>';

        return $html;
    }

    /**
     * @return array{tile: string, icon: string}
     */
    private function accent(bool $forceDark, bool $forceLight): array
    {
        $map = [
            'blue' => ['bg-blue-50 text-blue-600', 'bg-blue-500/10 text-blue-400'],
            'green' => ['bg-green-50 text-green-600', 'bg-green-500/10 text-green-400'],
            'red' => ['bg-red-50 text-red-600', 'bg-red-500/10 text-red-400'],
            'yellow' => ['bg-yellow-50 text-yellow-600', 'bg-yellow-500/10 text-yellow-400'],
            'purple' => ['bg-purple-50 text-purple-600', 'bg-purple-500/10 text-purple-400'],
            'pink' => ['bg-pink-50 text-pink-600', 'bg-pink-500/10 text-pink-400'],
            'gray' => ['bg-gray-100 text-gray-600', 'bg-gray-500/10 text-gray-400'],
            'brand' => ['bg-indigo-50 text-indigo-600', 'bg-indigo-500/10 text-indigo-400'],
        ];
        $pair = $map[$this->color] ?? $map['brand'];

        if ($forceDark) {
            return ['tile' => $pair[1], 'icon' => $pair[1]];
        }
        if ($forceLight) {
            return ['tile' => $pair[0], 'icon' => $pair[0]];
        }
        return ['tile' => $pair[0] . ' ' . $pair[1], 'icon' => $pair[0] . ' ' . $pair[1]];
    }

    private function sparkline(): string
    {
        $values = array_values($this->sparkline);
        $count = count($values);
        $w = 220;
        $h = 40;
        $stroke = match ($this->color) {
            'blue' => '#3b82f6',
            'green' => '#22c55e',
            'red' => '#ef4444',
            'yellow' => '#eab308',
            'purple' => '#a855f7',
            'pink' => '#ec4899',
            'gray' => '#9ca3af',
            default => '#6366f1',
        };

        if ($count < 2) {
            return '';
        }

        $min = min($values);
        $max = max($values);
        $span = $max - $min ?: 1;
        $step = $w / ($count - 1);

        $points = [];
        foreach ($values as $i => $v) {
            $x = round($i * $step, 1);
            $y = round($h - (($v - $min) / $span) * $h, 1);
            $points[] = $x . ',' . $y;
        }
        $poly = implode(' ', $points);
        $area = '0,' . $h . ' ' . $poly . ' ' . $w . ',' . $h;

        return '<svg viewBox="0 0 ' . $w . ' ' . $h . '" preserveAspectRatio="none" class="h-10 w-full">'
            . '<polygon points="' . $area . '" fill="' . $stroke . '" fill-opacity="0.12"></polygon>'
            . '<polyline points="' . $poly . '" fill="none" stroke="' . $stroke . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></polyline>'
            . '</svg>';
    }
}
