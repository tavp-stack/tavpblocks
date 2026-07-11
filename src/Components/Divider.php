<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Divider extends Component
{
    public function __construct(
        private string $label = '',
    ) {
    }

    public function render(): string
    {
        if ($this->label !== '') {
            return '<div class="relative"><div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-200"></div></div><div class="relative flex justify-center text-sm"><span class="bg-white px-2 text-gray-500">' . htmlspecialchars($this->label) . '</span></div></div>';
        }

        return '<hr class="border-gray-200 my-4">';
    }
}
