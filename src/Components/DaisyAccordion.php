<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyAccordion - DaisyUI accordion component.
 * Uses semantic classes: collapse, collapse-arrow, etc.
 */
class DaisyAccordion extends DaisyComponent
{
    private array $items = [];

    public function __construct(
        private bool $arrow = true,
        private bool $plus = false,
    ) {
    }

    public function addItem(string $title, string $content, bool $open = false): self
    {
        $this->items[] = [
            'title' => $title,
            'content' => $content,
            'open' => $open,
        ];
        return $this;
    }

    public function render(): string
    {
        $html = '';

        foreach ($this->items as $index => $item) {
            $classes = ['collapse'];

            if ($this->arrow) {
                $classes[] = 'collapse-arrow';
            }
            if ($this->plus) {
                $classes[] = 'collapse-plus';
            }

            $openClass = $item['open'] ? ' collapse-open' : '';
            $classStr = implode(' ', array_filter($classes));

            $html .= '<div class="' . $classStr . $openClass . '">';
            $html .= '<input type="radio" name="accordion-' . $index . '" ' . ($item['open'] ? 'checked' : '') . ' />';
            $html .= '<div class="collapse-title text-xl font-medium">' . htmlspecialchars($item['title']) . '</div>';
            $html .= '<div class="collapse-content"><p>' . $item['content'] . '</p></div>';
            $html .= '</div>';
        }

        return $html;
    }
}
