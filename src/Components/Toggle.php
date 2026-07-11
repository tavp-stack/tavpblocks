<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Toggle extends Component
{
    public function __construct(
        private bool $checked = false,
        private string $label = '',
    ) {
    }

    public function render(): string
    {
        $checked = $this->checked ? ' checked' : '';

        return '<label class="relative inline-flex items-center cursor-pointer">' .
            '<input type="checkbox" class="sr-only peer"' . $checked . '>' .
            '<div class="w-11 h-6 bg-gray-200 peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[\'\'] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>' .
            ($this->label !== '' ? '<span class="ml-3 text-sm text-gray-700">' . htmlspecialchars($this->label) . '</span>' : '') .
            '</label>';
    }
}
