<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class SearchBar extends Component
{
    public function __construct(
        private string $placeholder = 'Search...',
        private string $name = 'q',
        private string $value = '',
    ) {
    }

    public function render(): string
    {
        $html = '<div class="relative">';
        $html .= '<svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>';
        $html .= '<input type="text" name="' . htmlspecialchars($this->name) . '" value="' . htmlspecialchars($this->value) . '" placeholder="' . htmlspecialchars($this->placeholder) . '" class="w-full rounded-lg border border-gray-300 bg-white pl-10 pr-4 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/30 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100">';
        $html .= '</div>';

        return $html;
    }
}
