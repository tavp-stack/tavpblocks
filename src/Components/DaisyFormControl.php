<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyFormControl - DaisyUI form control component.
 * Uses semantic classes: form-control, etc.
 */
class DaisyFormControl extends DaisyComponent
{
    public function __construct(
        private string $content = '',
        private string $width = 'full',
    ) {
    }

    public function render(): string
    {
        return '<div class="form-control w-' . $this->width . '">' . $this->content . '</div>';
    }
}
