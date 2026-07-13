<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyIndicator - DaisyUI indicator component.
 * Uses semantic classes: indicator, indicator-item, badge, etc.
 */
class DaisyIndicator extends DaisyComponent
{
    public function __construct(
        private string $content = '',
        private string $badge = '',
        private string $badgeVariant = 'primary',
        private string $position = 'top-end',
    ) {
    }

    public function render(): string
    {
        $positionMap = [
            'top-start' => 'indicator-top indicator-start',
            'top-center' => 'indicator-top indicator-center',
            'top-end' => 'indicator-top indicator-end',
            'middle-start' => 'indicator-middle indicator-start',
            'middle-center' => 'indicator-middle indicator-center',
            'middle-end' => 'indicator-middle indicator-end',
            'bottom-start' => 'indicator-bottom indicator-start',
            'bottom-center' => 'indicator-bottom indicator-center',
            'bottom-end' => 'indicator-bottom indicator-end',
        ];

        $positionClass = $positionMap[$this->position] ?? 'indicator-top indicator-end';

        $badgeVariantMap = [
            'primary' => 'badge-primary',
            'secondary' => 'badge-secondary',
            'accent' => 'badge-accent',
            'info' => 'badge-info',
            'success' => 'badge-success',
            'warning' => 'badge-warning',
            'error' => 'badge-error',
            'default' => '',
        ];

        $badgeClass = $badgeVariantMap[$this->badgeVariant] ?? '';

        $html = '<div class="indicator">';

        if ($this->badge !== '') {
            $html .= '<span class="indicator-item badge ' . $badgeClass . '">' . htmlspecialchars($this->badge) . '</span>';
        }

        $html .= $this->content;
        $html .= '</div>';

        return $html;
    }
}
