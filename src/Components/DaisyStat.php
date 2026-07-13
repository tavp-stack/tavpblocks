<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyStat - DaisyUI stat component.
 * Uses semantic classes: stats, stat, stat-title, stat-value, etc.
 */
class DaisyStat extends DaisyComponent
{
    public function __construct(
        private string $title = '',
        private string $value = '',
        private string $desc = '',
        private string $icon = '',
        private string $variant = 'default',
    ) {
    }

    public function render(): string
    {
        $classes = ['stat'];

        $variantMap = [
            'primary' => 'bg-primary text-primary-content',
            'secondary' => 'bg-secondary text-secondary-content',
            'accent' => 'bg-accent text-accent-content',
            'info' => 'bg-info text-info-content',
            'success' => 'bg-success text-success-content',
            'warning' => 'bg-warning text-warning-content',
            'error' => 'bg-error text-error-content',
            'default' => '',
        ];

        $classes[] = self::variantClass($this->variant, $variantMap);
        $classStr = implode(' ', array_filter($classes));

        $html = '<div class="' . $classStr . '">';

        if ($this->icon !== '') {
            $html .= '<div class="stat-figure text-secondary">' . $this->icon . '</div>';
        }

        if ($this->title !== '') {
            $html .= '<div class="stat-title">' . htmlspecialchars($this->title) . '</div>';
        }

        if ($this->value !== '') {
            $html .= '<div class="stat-value">' . htmlspecialchars($this->value) . '</div>';
        }

        if ($this->desc !== '') {
            $html .= '<div class="stat-desc">' . htmlspecialchars($this->desc) . '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
