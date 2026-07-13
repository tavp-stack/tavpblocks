<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyValidator - DaisyUI validator component.
 * Uses semantic classes: validator, validator-hint, etc.
 */
class DaisyValidator extends DaisyComponent
{
    public function __construct(
        private string $content = '',
        private string $hint = '',
        private string $error = '',
    ) {
    }

    public function render(): string
    {
        $html = '<div class="validator">';

        $html .= $this->content;

        if ($this->hint !== '') {
            $html .= '<div class="validator-hint">' . htmlspecialchars($this->hint) . '</div>';
        }

        if ($this->error !== '') {
            $html .= '<div class="validator-hint text-error">' . htmlspecialchars($this->error) . '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
