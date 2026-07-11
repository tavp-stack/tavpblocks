<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class ProgressBar extends Component
{
    public function __construct(
        private int $percent = 0,
        private string $color = 'blue',
    ) {
    }

    public function render(): string
    {
        $colorClass = match ($this->color) {
            'green' => 'bg-green-500',
            'red' => 'bg-red-500',
            'yellow' => 'bg-yellow-500',
            default => 'bg-blue-500',
        };

        $percent = max(0, min(100, $this->percent));

        return '<div class="w-full bg-gray-200 rounded-full h-2.5"><div class="h-2.5 rounded-full ' . $colorClass . '" style="width: ' . $percent . '%"></div></div>';
    }
}
