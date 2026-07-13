<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyWindowMockup - DaisyUI window mockup component.
 * Uses semantic classes: mockup-window, mockup-code, etc.
 */
class DaisyWindowMockup extends DaisyComponent
{
    public function __construct(
        private string $content = '',
        private string $borderColor = 'border-base-300',
    ) {
    }

    public function render(): string
    {
        $html = '<div class="mockup-window border ' . $this->borderColor . '">';
        $html .= '<div class="flex justify-center px-4 py-16 border-t ' . $this->borderColor . '">';
        $html .= $this->content;
        $html .= '</div></div>';

        return $html;
    }
}
