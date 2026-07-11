<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Badge extends Component
{
    public function __construct(
        private string $label = '',
        private string $color = 'gray',
    ) {
    }

    public function render(): string
    {
        $classes = match ($this->color) {
            'green' => 'bg-green-100 text-green-800',
            'red' => 'bg-red-100 text-red-800',
            'yellow' => 'bg-yellow-100 text-yellow-800',
            'blue' => 'bg-blue-100 text-blue-800',
            default => 'bg-gray-100 text-gray-800',
        };

        return "<span class=\"inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {$classes}\">" . htmlspecialchars($this->label) . "</span>";
    }
}
