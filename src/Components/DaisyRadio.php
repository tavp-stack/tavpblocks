<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyRadio - DaisyUI radio component.
 * Uses semantic classes: radio, radio-primary, etc.
 */
class DaisyRadio extends DaisyComponent
{
    public function __construct(
        private string $name = '',
        private string $label = '',
        private string $value = '',
        private bool $checked = false,
        private string $size = 'md',
        private string $variant = 'default',
        private bool $disabled = false,
    ) {
    }

    public function render(): string
    {
        $classes = ['radio'];

        $sizeMap = [
            'xs' => 'radio-xs',
            'sm' => 'radio-sm',
            'md' => '',
            'lg' => 'radio-lg',
        ];

        $variantMap = [
            'primary' => 'radio-primary',
            'secondary' => 'radio-secondary',
            'accent' => 'radio-accent',
            'info' => 'radio-info',
            'success' => 'radio-success',
            'warning' => 'radio-warning',
            'error' => 'radio-error',
            'default' => '',
        ];

        $classes[] = self::sizeClass($this->size, $sizeMap);
        $classes[] = self::variantClass($this->variant, $variantMap);

        if ($this->disabled) {
            $classes[] = 'radio-disabled';
        }

        $classStr = implode(' ', array_filter($classes));
        $checkedAttr = $this->checked ? ' checked' : '';
        $disabledAttr = $this->disabled ? ' disabled' : '';

        $html = '<label class="label cursor-pointer gap-4">';
        $html .= '<span class="label-text">' . htmlspecialchars($this->label) . '</span>';
        $html .= '<input type="radio" name="' . htmlspecialchars($this->name) . '" value="' . htmlspecialchars($this->value) . '" class="' . $classStr . '"' . $checkedAttr . $disabledAttr . ' />';
        $html .= '</label>';

        return $html;
    }
}
