<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyDiff - DaisyUI diff (comparison) component.
 * Uses semantic classes: diff, diff-item-1, diff-item-2, etc.
 */
class DaisyDiff extends DaisyComponent
{
    public function __construct(
        private string $item1 = '',
        private string $item2 = '',
        private string $width = 'w-96',
        private string $height = 'h-96',
    ) {
    }

    public function render(): string
    {
        $html = '<figure class="diff ' . $this->width . ' ' . $this->height . '" tabindex="0">';
        $html .= '<div class="diff-item-1">' . $this->item1 . '</div>';
        $html .= '<div class="diff-item-2">' . $this->item2 . '</div>';
        $html .= '</figure>';

        return $html;
    }
}
