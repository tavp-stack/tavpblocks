<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyLabel - DaisyUI label component.
 * Uses semantic classes: label, label-text, etc.
 */
class DaisyLabel extends DaisyComponent
{
    public function __construct(
        private string $text = '',
        private string $position = 'top',
        private string $altText = '',
    ) {
    }

    public function render(): string
    {
        $html = '<label class="label">';

        if ($this->position === 'top') {
            $html .= '<span class="label-text">' . htmlspecialchars($this->text) . '</span>';
        }

        if ($this->altText !== '') {
            $html .= '<span class="label-text-alt">' . htmlspecialchars($this->altText) . '</span>';
        }

        $html .= '</label>';

        return $html;
    }
}
