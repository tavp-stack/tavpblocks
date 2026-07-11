<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Navbar extends Component
{
    private array $items = [];
    private string $brand = '';

    public function __construct(string $brand = '')
    {
        $this->brand = $brand;
    }

    public function addItem(string $label, string $url, bool $active = false): self
    {
        $this->items[] = ['label' => $label, 'url' => $url, 'active' => $active];
        return $this;
    }

    public function render(): string
    {
        $html = '<nav class="bg-white shadow-sm border-b border-gray-200">';
        $html .= '<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">';
        $html .= '<div class="flex justify-between h-16">';
        $html .= '<div class="flex items-center">';
        $html .= '<a href="/" class="text-xl font-bold text-gray-900">' . htmlspecialchars($this->brand) . '</a>';
        $html .= '</div>';
        $html .= '<div class="flex items-center space-x-4">';

        foreach ($this->items as $item) {
            $activeClass = $item['active'] ? 'text-blue-600 border-blue-600' : 'text-gray-500 hover:text-gray-700 border-transparent';
            $html .= '<a href="' . htmlspecialchars($item['url']) . '" class="inline-flex items-center px-1 pt-1 text-sm font-medium border-b-2 ' . $activeClass . '">' . htmlspecialchars($item['label']) . '</a>';
        }

        $html .= '</div></div></div></nav>';

        return $html;
    }
}
