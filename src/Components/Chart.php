<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * Chart component — renders a simple bar/line chart using pure CSS + Alpine.js.
 * No external dependencies required.
 */
class Chart extends Component
{
    /** @var array<int, array{label: string, value: float}> */
    private array $data = [];

    public function __construct(
        private string $type = 'bar',
        private string $title = '',
        private int $height = 200,
    ) {
    }

    public function addPoint(string $label, float $value): self
    {
        $this->data[] = ['label' => $label, 'value' => $value];
        return $this;
    }

    public function render(): string
    {
        if (empty($this->data)) {
            return '<div class="text-gray-500 text-sm">No data</div>';
        }

        $max = max(array_column($this->data, 'value'));
        if ($max === 0) {
            $max = 1;
        }

        $html = '<div class="w-full">';
        if ($this->title !== '') {
            $html .= '<h3 class="text-sm font-medium text-gray-700 mb-2">' . htmlspecialchars($this->title) . '</h3>';
        }

        if ($this->type === 'bar') {
            $html .= '<div class="flex items-end gap-1" style="height: ' . $this->height . 'px">';
            foreach ($this->data as $point) {
                $percent = ($point['value'] / $max) * 100;
                $html .= '<div class="flex-1 flex flex-col items-center justify-end">';
                $html .= '<div class="w-full bg-blue-500 rounded-t" style="height: ' . $percent . '%"></div>';
                $html .= '<div class="text-xs text-gray-500 mt-1 text-center">' . htmlspecialchars($point['label']) . '</div>';
                $html .= '</div>';
            }
            $html .= '</div>';
        } elseif ($this->type === 'line') {
            $html .= '<svg viewBox="0 0 100 50" class="w-full" style="height: ' . $this->height . 'px">';
            $points = [];
            $count = count($this->data);
            foreach ($this->data as $i => $point) {
                $x = ($i / ($count - 1)) * 100;
                $y = 50 - (($point['value'] / $max) * 50);
                $points[] = "{$x},{$y}";
            }
            $html .= '<polyline fill="none" stroke="rgb(59,130,246)" stroke-width="2" points="' . implode(' ', $points) . '"/>';
            $html .= '</svg>';
        } elseif ($this->type === 'horizontal') {
            $html .= '<div class="space-y-2">';
            foreach ($this->data as $point) {
                $percent = ($point['value'] / $max) * 100;
                $html .= '<div class="flex items-center gap-2">';
                $html .= '<div class="w-24 text-sm text-gray-600 text-right">' . htmlspecialchars($point['label']) . '</div>';
                $html .= '<div class="flex-1 bg-gray-200 rounded-full h-4">';
                $html .= '<div class="bg-blue-500 rounded-full h-4" style="width: ' . $percent . '%"></div>';
                $html .= '</div>';
                $html .= '<div class="w-16 text-sm text-gray-500">' . number_format($point['value']) . '</div>';
                $html .= '</div>';
            }
            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
