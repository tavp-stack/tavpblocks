<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyDropdown - DaisyUI dropdown component.
 * Uses semantic classes: dropdown, dropdown-content, etc.
 */
class DaisyDropdown extends DaisyComponent
{
    private array $items = [];

    public function __construct(
        private string $label = 'Dropdown',
        private string $position = 'bottom',
        private string $variant = 'default',
        private string $size = 'md',
        private bool $hover = false,
    ) {
    }

    public function addItem(string $label, string $href = '', string $icon = ''): self
    {
        $this->items[] = [
            'label' => $label,
            'href' => $href,
            'icon' => $icon,
        ];
        return $this;
    }

    public function render(): string
    {
        $classes = ['dropdown'];

        $positionMap = [
            'top' => 'dropdown-top',
            'bottom' => 'dropdown-bottom',
            'left' => 'dropdown-left',
            'right' => 'dropdown-right',
            'end' => 'dropdown-end',
        ];

        $classes[] = $positionMap[$this->position] ?? 'dropdown-bottom';

        if ($this->hover) {
            $classes[] = 'dropdown-hover';
        }

        $classStr = implode(' ', array_filter($classes));

        $html = '<div class="' . $classStr . '">';
        $html .= '<label tabindex="0" class="btn">' . htmlspecialchars($this->label) . '</label>';
        $html .= '<ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">';

        foreach ($this->items as $item) {
            $html .= '<li>';
            if ($item['href'] !== '') {
                $html .= '<a href="' . htmlspecialchars($item['href']) . '">';
            } else {
                $html .= '<a>';
            }
            if ($item['icon'] !== '') {
                $html .= $item['icon'] . ' ';
            }
            $html .= htmlspecialchars($item['label']) . '</a>';
            $html .= '</li>';
        }

        $html .= '</ul>';
        $html .= '</div>';

        return $html;
    }
}
