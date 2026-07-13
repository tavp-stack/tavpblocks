<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyStack - DaisyUI stack component.
 * Uses semantic classes: stack, etc.
 */
class DaisyStack extends DaisyComponent
{
    private array $items = [];

    public function __construct(
        private string $direction = 'vertical',
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
            'vertical' => '',
            'horizontal' => 'stack-horizontal',
        ];

        $directionClass = $directionMap[$this->direction] ?? '';

        $html = '<div class="stack ' . $directionClass . '">';

        foreach ($this->items as $item) {
            $html .= '<div class="border border-base-300 bg-base-100 rounded-box p-4">' . $item . '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
