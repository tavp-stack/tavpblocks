<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyHint - DaisyUI hint component.
 * Uses semantic classes: label, label-text-alt, etc.
 */
class DaisyHint extends DaisyComponent
{
    public function __construct(
        private string $text = '',
        private string $variant = 'default',
    ) {
    }

    public function render(): string
    {
        $variantMap = [
            'error' => 'text-error',
            'success' => 'text-success',
            'warning' => 'text-warning',
            'info' => 'text-info',
            'default' => '',
        ];

        $variantClass = $variantMap[$this->variant] ?? '';

        return '<label class="label"><span class="label-text-alt ' . $variantClass . '">' . htmlspecialchars($this->text) . '</span></label>';
    }
}
