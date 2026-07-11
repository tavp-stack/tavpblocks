<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Chip extends Component
{
    public function __construct(
        private string $label = '',
        private string $color = 'gray',
        private bool $removable = false,
    ) {
    }

    public function render(): string
    {
        $colors = match ($this->color) {
            'green' => 'bg-green-100 text-green-800 border-green-200',
            'red' => 'bg-red-100 text-red-800 border-red-200',
            'blue' => 'bg-blue-100 text-blue-800 border-blue-200',
            'purple' => 'bg-purple-100 text-purple-800 border-purple-200',
            default => 'bg-gray-100 text-gray-800 border-gray-200',
        };

        $remove = $this->removable
            ? '<button class="ml-1 text-gray-500 hover:text-gray-700">&times;</button>'
            : '';

        return '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border ' . $colors . '">' .
            htmlspecialchars($this->label) . $remove . '</span>';
    }
}
