<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyRange - DaisyUI range component.
 * Uses semantic classes: range, range-primary, etc.
 */
class DaisyRange extends DaisyComponent
{
    public function __construct(
        private string $name = '',
        private string $label = '',
        private int $min = 0,
        private int $max = 100,
        private int $value = 50,
        private int $step = 1,
        private string $variant = 'default',
        private string $size = 'md',
        private bool $disabled = false,
    ) {
    }

    public function render(): string
    {
        $classes = ['range'];

        $sizeMap = [
            'xs' => 'range-xs',
            'sm' => 'range-sm',
            'md' => '',
            'lg' => 'range-lg',
        ];

        $variantMap = [
            'primary' => 'range-primary',
            'secondary' => 'range-secondary',
            'accent' => 'range-accent',
            'info' => 'range-info',
            'success' => 'range-success',
            'warning' => 'range-warning',
            'error' => 'range-error',
            'default' => '',
        ];

        $classes[] = self::sizeClass($this->size, $sizeMap);
        $classes[] = self::variantClass($this->variant, $variantMap);

        if ($this->disabled) {
            $classes[] = 'range-disabled';
        }

        $classStr = implode(' ', array_filter($classes));
        $disabledAttr = $this->disabled ? ' disabled' : '';

        $html = '';

        if ($this->label !== '') {
            $html .= '<label class="label"><span class="label-text">' . htmlspecialchars($this->label) . '</span></label>';
        }

        $html .= '<input type="range" name="' . htmlspecialchars($this->name) . '" min="' . $this->min . '" max="' . $this->max . '" value="' . $this->value . '" step="' . $this->step . '" class="' . $classStr . '"' . $disabledAttr . ' />';

        return $html;
    }
}
