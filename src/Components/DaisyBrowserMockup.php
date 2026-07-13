<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyBrowserMockup - DaisyUI browser mockup component.
 * Uses semantic classes: mockup-browser, etc.
 */
class DaisyBrowserMockup extends DaisyComponent
{
    public function __construct(
        private string $url = 'https://',
        private string $content = '',
    ) {
    }

    public function render(): string
    {
        $html = '<div class="mockup-browser border border-base-300">';
        $html .= '<div class="mockup-browser-toolbar">';
        $html .= '<div class="input border border-base-300">' . htmlspecialchars($this->url) . '</div>';
        $html .= '</div>';
        $html .= '<div class="flex justify-center px-4 py-16 border-t border-base-300">';
        $html .= $this->content;
        $html .= '</div></div>';

        return $html;
    }
}
