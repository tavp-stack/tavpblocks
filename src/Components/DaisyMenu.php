<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyMenu - DaisyUI menu component.
 * Uses semantic classes: menu, menu-title, etc.
 */
class DaisyMenu extends DaisyComponent
{
    private array $items = [];

    public function __construct(
        private string $size = 'md',
        private bool $compact = false,
        private string $direction = 'vertical',
    ) {
    }

    public function addItem(string $label, string $href = '', string $icon = '', bool $active = false, bool $disabled = false): self
    {
        $this->items[] = [
            'label' => $label,
            'href' => $href,
            'icon' => $icon,
            'active' => $active,
            'disabled' => $disabled,
        ];
        return $this;
    }

    public function addTitle(string $title): self
    {
        $this->items[] = [
            'type' => 'title',
            'label' => $title,
        ];
        return $this;
    }

    public function render(): string
    {
        $classes = ['menu'];

        $sizeMap = [
            'xs' => 'menu-xs',
            'sm' => 'menu-sm',
            'md' => '',
            'lg' => 'menu-lg',
        ];

        $directionMap = [
            'vertical' => '',
            'horizontal' => 'menu-horizontal',
        ];

        $classes[] = self::sizeClass($this->size, $sizeMap);
        $classes[] = $directionMap[$this->direction] ?? '';

        if ($this->compact) {
            $classes[] = 'menu-compact';
        }

        $classStr = implode(' ', array_filter($classes));

        $html = '<ul class="' . $classStr . '">';

        foreach ($this->items as $item) {
            if (isset($item['type']) && $item['type'] === 'title') {
                $html .= '<li class="menu-title"><span>' . htmlspecialchars($item['label']) . '</span></li>';
                continue;
            }

            $activeClass = $item['active'] ? ' active' : '';
            $disabledClass = $item['disabled'] ? ' disabled' : '';

            $html .= '<li class="' . trim($activeClass . $disabledClass) . '">';
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

        return $html;
    }
}
