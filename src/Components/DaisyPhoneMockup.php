<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyPhoneMockup - DaisyUI phone mockup component.
 * Uses semantic classes: mockup-phone, etc.
 */
class DaisyPhoneMockup extends DaisyComponent
{
    public function __construct(
        private string $content = '',
    ) {
    }

    public function render(): string
    {
        $html = '<div class="mockup-phone">';
        $html .= '<div class="camera"></div>';
        $html .= '<div class="display">';
        $html .= '<div class="artboard artboard-demo phone-1">' . $this->content . '</div>';
        $html .= '</div></div>';

        return $html;
    }
}
