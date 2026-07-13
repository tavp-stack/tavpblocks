<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyError - DaisyUI error component.
 * Uses semantic classes: label, label-text-alt, text-error, etc.
 */
class DaisyError extends DaisyComponent
{
    public function __construct(
        private string $text = '',
    ) {
    }

    public function render(): string
    {
        return '<label class="label"><span class="label-text-alt text-error">' . htmlspecialchars($this->text) . '</span></label>';
    }
}
