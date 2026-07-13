<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyJoin - DaisyUI join component.
 * Uses semantic classes: join, join-item, etc.
 */
class DaisyJoin extends DaisyComponent
{
    private array $items = [];

    public function __construct(
        private string $direction = 'horizontal',
    ) {
    }

    public function addItem(string $content): self
    {
        $this->items[] = $content;
        return $this;
    }

    public function render(): string
    {
        $directionMap = [
            'horizontal' => '',
            'vertical' => 'join-vertical',
        ];

        $directionClass = $directionMap[$this->direction] ?? '';

        $html = '<div class="join ' . $directionClass . '">';

        foreach ($this->items as $item) {
            $html .= '<div class="join-item">' . $item . '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
