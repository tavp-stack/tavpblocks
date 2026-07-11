<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Accordion extends Component
{
    /** @var array<int, array{title: string, content: string}> */
    private array $items = [];

    public function addItem(string $title, string $content): self
    {
        $this->items[] = ['title' => $title, 'content' => $content];
        return $this;
    }

    public function render(): string
    {
        $html = '<div class="divide-y divide-gray-200 border border-gray-200 rounded-lg">';

        foreach ($this->items as $i => $item) {
            $id = 'accordion-' . $i;
            $html .= '<div>';
            $html .= '<button onclick="document.getElementById(\'' . $id . '\').classList.toggle(\'hidden\')" class="w-full flex justify-between items-center px-4 py-3 text-left text-sm font-medium hover:bg-gray-50">';
            $html .= htmlspecialchars($item['title']);
            $html .= '<svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>';
            $html .= '</button>';
            $html .= '<div id="' . $id . '" class="hidden px-4 pb-3 text-sm text-gray-600">' . $item['content'] . '</div>';
            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
