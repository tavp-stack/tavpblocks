<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Avatar extends Component
{
    public function __construct(
        private string $name = '',
        private string $src = '',
        private string $size = 'md',
    ) {
    }

    public function render(): string
    {
        $sizeClass = match ($this->size) {
            'sm' => 'w-8 h-8 text-xs',
            'lg' => 'w-12 h-12 text-lg',
            default => 'w-10 h-10 text-sm',
        };

        if ($this->src !== '') {
            return '<img src="' . htmlspecialchars($this->src) . '" alt="' . htmlspecialchars($this->name) . '" class="' . $sizeClass . ' rounded-full object-cover">';
        }

        $initials = strtoupper(substr($this->name, 0, 2));
        $colors = ['bg-blue-500', 'bg-green-500', 'bg-purple-500', 'bg-pink-500', 'bg-orange-500'];
        $colorIndex = crc32($this->name) % count($colors);

        return '<div class="' . $sizeClass . ' rounded-full ' . $colors[$colorIndex] . ' flex items-center justify-center text-white font-medium">' . $initials . '</div>';
    }
}
