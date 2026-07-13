<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyToggle - DaisyUI toggle component.
 * Uses semantic classes: toggle, toggle-primary, etc.
 */
class DaisyToggle extends DaisyComponent
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
        $classes = ['toggle'];

        $sizeMap = [
            'xs' => 'toggle-xs',
            'sm' => 'toggle-sm',
            'md' => '',
            'lg' => 'toggle-lg',
        ];

        $variantMap = [
            'primary' => 'toggle-primary',
            'secondary' => 'toggle-secondary',
            'accent' => 'toggle-accent',
            'info' => 'toggle-info',
            'success' => 'toggle-success',
            'warning' => 'toggle-warning',
            'error' => 'toggle-error',
            'default' => '',
        ];

        $classes[] = self::sizeClass($this->size, $sizeMap);
        $classes[] = self::variantClass($this->variant, $variantMap);

        if ($this->disabled) {
            $classes[] = 'toggle-disabled';
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
