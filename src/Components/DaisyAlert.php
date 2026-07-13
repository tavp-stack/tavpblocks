<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyAlert - DaisyUI alert component.
 * Uses semantic classes: alert, alert-info, alert-success, etc.
 */
class DaisyAlert extends DaisyComponent
{
    public function __construct(
        private string $message = '',
        private string $variant = 'info',
        private string $icon = '',
        private bool $showIcon = true,
    ) {
    }

    public function render(): string
    {
        $classes = ['alert'];

        $variantMap = [
            'info' => 'alert-info',
            'success' => 'alert-success',
            'warning' => 'alert-warning',
            'error' => 'alert-error',
            'default' => '',
        ];

        $classes[] = self::variantClass($this->variant, $variantMap);
        $classStr = implode(' ', array_filter($classes));

        $icons = [
            'info' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            'success' => '<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
            'warning' => '<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z" /></svg>',
            'error' => '<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
        ];

        $iconHtml = '';
        if ($this->showIcon) {
            $iconHtml = $this->icon !== '' ? $this->icon : ($icons[$this->variant] ?? '');
        }

        $html = '<div class="' . $classStr . '">';
        $html .= $iconHtml;
        $html .= '<span>' . htmlspecialchars($this->message) . '</span>';
        $html .= '</div>';

        return $html;
    }
}
