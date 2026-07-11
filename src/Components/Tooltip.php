<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Tooltip extends Component
{
    public function __construct(
        private string $text = '',
        private string $content = '',
    ) {
    }

    public function render(): string
    {
        return '<span class="relative group cursor-help">' . $this->content . '<span class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-1.5 text-xs font-medium text-white bg-gray-900 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">' . htmlspecialchars($this->text) . '</span></span>';
    }
}
