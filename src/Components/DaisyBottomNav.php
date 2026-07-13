<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyBottomNav - DaisyUI bottom navigation component.
 * Uses semantic classes: btm-nav, btm-nav-xs, btm-nav-lg, etc.
 */
class DaisyBottomNav extends DaisyComponent
{
    private array $items = [];

    public function __construct(
        private string $size = 'md',
    ) {
    }

    public function addItem(string $label, string $icon, string $href = '', bool $active = false): self
    {
        $this->items[] = [
            'label' => $label,
            'icon' => $icon,
            'href' => $href,
            'active' => $active,
        ];
        return $this;
    }

    public function render(): string
    {
        $sizeMap = [
            'xs' => 'btm-nav-xs',
            'sm' => 'btm-nav-sm',
            'md' => '',
            'lg' => 'btm-nav-lg',
        ];

        $sizeClass = $sizeMap[$this->size] ?? '';

        $html = '<div class="btm-nav ' . $sizeClass . '">';

        foreach ($this->items as $item) {
            $activeClass = $item['active'] ? ' active' : '';

            if ($item['href'] !== '') {
                $html .= '<a href="' . htmlspecialchars($item['href']) . '" class="' . $activeClass . '">';
            } else {
                $html .= '<button class="' . $activeClass . '">';
            }

            $html .= $item['icon'];
            $html .= '<span class="btm-nav-label">' . htmlspecialchars($item['label']) . '</span>';

            if ($item['href'] !== '') {
                $html .= '</a>';
            } else {
                $html .= '</button>';
            }
        }

        $html .= '</div>';

        return $html;
    }
}
