<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyWarning - DaisyUI warning component.
 * Uses semantic classes: label, label-text-alt, text-warning, etc.
 */
class DaisyWarning extends DaisyComponent
{
    public function __construct(
        private string $text = '',
    ) {
    }

    public function render(): string
    {
        return '<label class="label"><span class="label-text-alt text-warning">' . htmlspecialchars($this->text) . '</span></label>';
    }
}
