<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyCheckbox - DaisyUI checkbox component.
 * Uses semantic classes: checkbox, checkbox-primary, etc.
 */
class DaisyCheckbox extends DaisyComponent
{
    public function __construct(
        private string $name = '',
        private string $label = '',
        private bool $checked = false,
        private string $size = 'md',
        private string $variant = 'default',
        private bool $disabled = false,
    ) {
    }

    public function render(): string
    {
        $classes = ['checkbox'];

        $sizeMap = [
            'xs' => 'checkbox-xs',
            'sm' => 'checkbox-sm',
            'md' => '',
            'lg' => 'checkbox-lg',
        ];

        $variantMap = [
            'primary' => 'checkbox-primary',
            'secondary' => 'checkbox-secondary',
            'accent' => 'checkbox-accent',
            'info' => 'checkbox-info',
            'success' => 'checkbox-success',
            'warning' => 'checkbox-warning',
            'error' => 'checkbox-error',
            'default' => '',
        ];

        $classes[] = self::sizeClass($this->size, $sizeMap);
        $classes[] = self::variantClass($this->variant, $variantMap);

        if ($this->disabled) {
            $classes[] = 'checkbox-disabled';
        }

        $classStr = implode(' ', array_filter($classes));
        $checkedAttr = $this->checked ? ' checked' : '';
        $disabledAttr = $this->disabled ? ' disabled' : '';

        $html = '<label class="label cursor-pointer gap-4">';
        $html .= '<span class="label-text">' . htmlspecialchars($this->label) . '</span>';
        $html .= '<input type="checkbox" name="' . htmlspecialchars($this->name) . '" class="' . $classStr . '"' . $checkedAttr . $disabledAttr . ' />';
        $html .= '</label>';

        return $html;
    }
}
