<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyInfo - DaisyUI info component.
 * Uses semantic classes: label, label-text-alt, text-info, etc.
 */
class DaisyInfo extends DaisyComponent
{
    public function __construct(
        private string $text = '',
    ) {
    }

    public function render(): string
    {
        return '<label class="label"><span class="label-text-alt text-info">' . htmlspecialchars($this->text) . '</span></label>';
    }
}
