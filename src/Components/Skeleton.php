<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Skeleton extends Component
{
    public function __construct(
        private int $lines = 3,
        private string $width = 'full',
    ) {
    }

    public function render(): string
    {
        $html = '<div class="animate-pulse space-y-3">';
        $widthClass = match ($this->width) {
            'half' => 'w-1/2',
            'third' => 'w-1/3',
            default => 'w-full',
        };

        for ($i = 0; $i < $this->lines; $i++) {
            $w = $i === $this->lines - 1 ? 'w-3/4' : $widthClass;
            $html .= '<div class="h-4 bg-gray-200 rounded ' . $w . '"></div>';
        }

        $html .= '</div>';

        return $html;
    }
}
