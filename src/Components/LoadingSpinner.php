<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class LoadingSpinner extends Component
{
    public function __construct(
        private string $size = 'md',
        private string $color = 'blue',
    ) {
    }

    public function render(): string
    {
        $sizeClass = match ($this->size) {
            'sm' => 'w-4 h-4',
            'lg' => 'w-8 h-8',
            default => 'w-6 h-6',
        };

        $colorClass = match ($this->color) {
            'white' => 'border-white',
            'gray' => 'border-gray-400',
            default => 'border-blue-500',
        };

        return '<svg class="animate-spin ' . $sizeClass . ' ' . $colorClass . '" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>';
    }
}
