<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Breadcrumb extends Component
{
    /** @var array<int, array{label: string, url: string}> */
    private array $items = [];

    public function addItem(string $label, string $url = ''): self
    {
        $this->items[] = ['label' => $label, 'url' => $url];
        return $this;
    }

    public function render(): string
    {
        $html = '<nav class="flex items-center space-x-2 text-sm text-gray-500">';

        foreach ($this->items as $i => $item) {
            if ($i > 0) {
                $html .= '<span class="text-gray-400">/</span>';
            }

            if ($item['url'] !== '' && $i < count($this->items) - 1) {
                $html .= '<a href="' . $item['url'] . '" class="hover:text-gray-700">' . htmlspecialchars($item['label']) . '</a>';
            } else {
                $html .= '<span class="text-gray-900 font-medium">' . htmlspecialchars($item['label']) . '</span>';
            }
        }

        $html .= '</nav>';

        return $html;
    }
}
