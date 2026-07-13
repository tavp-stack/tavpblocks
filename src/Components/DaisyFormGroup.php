<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyFormGroup - DaisyUI form group component.
 * Uses semantic classes: form-control, label, etc.
 */
class DaisyFormGroup extends DaisyComponent
{
    public function __construct(
        private string $label = '',
        private string $content = '',
        private string $helperText = '',
        private string $errorText = '',
    ) {
    }

    public function render(): string
    {
        $html = '<div class="form-control w-full">';

        if ($this->label !== '') {
            $html .= '<label class="label"><span class="label-text">' . htmlspecialchars($this->label) . '</span></label>';
        }

        $html .= $this->content;

        if ($this->helperText !== '') {
            $html .= '<label class="label"><span class="label-text-alt">' . htmlspecialchars($this->helperText) . '</span></label>';
        }

        if ($this->errorText !== '') {
            $html .= '<label class="label"><span class="label-text-alt text-error">' . htmlspecialchars($this->errorText) . '</span></label>';
        }

        $html .= '</div>';

        return $html;
    }
}
