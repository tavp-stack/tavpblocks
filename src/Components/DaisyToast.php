<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyToast - DaisyUI toast component.
 * Uses semantic classes: toast, toast-start, toast-center, toast-end, etc.
 */
class DaisyToast extends DaisyComponent
{
    private array $messages = [];

    public function __construct(
        private string $position = 'end',
    ) {
    }

    public function addMessage(string $message, string $variant = 'info'): self
    {
        $this->messages[] = [
            'message' => $message,
            'variant' => $variant,
        ];
        return $this;
    }

    public function render(): string
    {
        $positionMap = [
            'start' => 'toast-start',
            'center' => 'toast-center',
            'end' => 'toast-end',
            'top' => 'toast-top',
            'middle' => 'toast-middle',
            'bottom' => 'toast-bottom',
        ];

        $positionClass = $positionMap[$this->position] ?? 'toast-end';

        $html = '<div class="toast ' . $positionClass . ' z-50">';

        foreach ($this->messages as $msg) {
            $variantMap = [
                'info' => 'alert-info',
                'success' => 'alert-success',
                'warning' => 'alert-warning',
                'error' => 'alert-error',
            ];

            $variantClass = $variantMap[$msg['variant']] ?? '';

            $html .= '<div class="alert ' . $variantClass . '">';
            $html .= '<span>' . htmlspecialchars($msg['message']) . '</span>';
            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
