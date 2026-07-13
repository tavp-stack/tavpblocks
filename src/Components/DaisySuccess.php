<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisySuccess - DaisyUI success component.
 * Uses semantic classes: label, label-text-alt, text-success, etc.
 */
class DaisySuccess extends DaisyComponent
{
    public function __construct(
        private string $text = '',
    ) {
    }

    public function render(): string
    {
        return '<label class="label"><span class="label-text-alt text-success">' . htmlspecialchars($this->text) . '</span></label>';
    }
}
