<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Tabs extends Component
{
    /** @var array<int, array{label: string, id: string, content: string}> */
    private array $tabs = [];

    public function __construct(
        private string $active = '',
    ) {
    }

    public function addTab(string $label, string $id, string $content): self
    {
        $this->tabs[] = ['label' => $label, 'id' => $id, 'content' => $content];
        return $this;
    }

    public function render(): string
    {
        $html = '<div x-data="{ active: \'' . $this->active . '\' }">';
        $html .= '<div class="flex border-b border-gray-200">';

        foreach ($this->tabs as $tab) {
            $active = $tab['id'] === $this->active ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700';
            $html .= '<button @click="active = \'' . $tab['id'] . '\'" class="px-4 py-2 text-sm font-medium border-b-2 ' . $active . '">' . htmlspecialchars($tab['label']) . '</button>';
        }

        $html .= '</div><div class="py-4">';

        foreach ($this->tabs as $tab) {
            $html .= '<div x-show="active === \'' . $tab['id'] . '\'">' . $tab['content'] . '</div>';
        }

        $html .= '</div></div>';

        return $html;
    }
}
