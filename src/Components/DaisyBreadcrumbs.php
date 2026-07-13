<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyBreadcrumbs - DaisyUI breadcrumbs component.
 * Uses semantic classes: breadcrumbs, text-sm, etc.
 */
class DaisyBreadcrumbs extends DaisyComponent
{
    private array $items = [];

    public function __construct(
        private string $size = 'md',
    ) {
    }

    public function addItem(string $label, string $href = ''): self
    {
        $this->items[] = [
            'label' => $label,
            'href' => $href,
        ];
        return $this;
    }

    public function render(): string
    {
        $sizeMap = [
            'xs' => 'text-xs',
            'sm' => 'text-sm',
            'md' => '',
            'lg' => 'text-lg',
        ];

        $sizeClass = $sizeMap[$this->size] ?? '';

        $html = '<div class="breadcrumbs ' . $sizeClass . '">';
        $html .= '<ul>';

        foreach ($this->items as $item) {
            $html .= '<li>';
            if ($item['href'] !== '') {
                $html .= '<a href="' . htmlspecialchars($item['href']) . '">' . htmlspecialchars($item['label']) . '</a>';
            } else {
                $html .= '<span>' . htmlspecialchars($item['label']) . '</span>';
            }
            $html .= '</li>';
        }

        $html .= '</ul>';
        $html .= '</div>';

        return $html;
    }
}
