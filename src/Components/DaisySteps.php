<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisySteps - DaisyUI steps component.
 * Uses semantic classes: steps, step, step-primary, etc.
 */
class DaisySteps extends DaisyComponent
{
    private array $items = [];

    public function __construct(
        private string $direction = 'horizontal',
    ) {
    }

    public function addItem(string $label, string $variant = 'default', string $icon = ''): self
    {
        $this->items[] = [
            'label' => $label,
            'variant' => $variant,
            'icon' => $icon,
        ];
        return $this;
    }

    public function render(): string
    {
        $classes = ['steps'];

        $directionMap = [
            'horizontal' => '',
            'vertical' => 'steps-vertical',
        ];

        $classes[] = $directionMap[$this->direction] ?? '';
        $classStr = implode(' ', array_filter($classes));

        $variantMap = [
            'primary' => 'step-primary',
            'secondary' => 'step-secondary',
            'accent' => 'step-accent',
            'info' => 'step-info',
            'success' => 'step-success',
            'warning' => 'step-warning',
            'error' => 'step-error',
            'default' => '',
        ];

        $html = '<ul class="' . $classStr . '">';

        foreach ($this->items as $item) {
            $variantClass = $variantMap[$item['variant']] ?? '';

            $html .= '<li class="step ' . $variantClass . '">';

            if ($item['icon'] !== '') {
                $html .= '<span class="step-icon">' . $item['icon'] . '</span>';
            }

            $html .= htmlspecialchars($item['label']);
            $html .= '</li>';
        }

        $html .= '</ul>';

        return $html;
    }
}
