<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Dropdown extends Component
{
    private array $items = [];

    public function __construct(
        private string $trigger = 'Menu',
    ) {
    }

    public function addItem(string $label, string $url = '', string $icon = ''): self
    {
        $this->items[] = ['label' => $label, 'url' => $url, 'icon' => $icon];
        return $this;
    }

    public function render(): string
    {
        $html = '<div x-data="{ open: false }" class="relative">';
        $html .= '<button @click="open = !open" class="flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">';
        $html .= htmlspecialchars($this->trigger);
        $html .= '<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>';
        $html .= '</button>';
        $html .= '<div x-show="open" @click.away="open = false" class="absolute right-0 z-50 mt-2 w-48 rounded-lg border border-gray-200 bg-white py-1 shadow-lg dark:border-gray-700 dark:bg-gray-800">';

        foreach ($this->items as $item) {
            if ($item['url'] !== '') {
                $html .= '<a href="' . htmlspecialchars($item['url']) . '" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">' . htmlspecialchars($item['label']) . '</a>';
            } else {
                $html .= '<div class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200">' . htmlspecialchars($item['label']) . '</div>';
            }
        }

        $html .= '</div></div>';

        return $html;
    }
}
