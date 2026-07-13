<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyFileInput - DaisyUI file input component.
 * Uses semantic classes: file-input, file-input-bordered, etc.
 */
class DaisyFileInput extends DaisyComponent
{
    public function __construct(
        private string $name = '',
        private string $label = '',
        private string $size = 'md',
        private string $variant = 'default',
        private bool $disabled = false,
        private bool $bordered = true,
        private bool $multiple = false,
    ) {
    }

    public function render(): string
    {
        $classes = ['file-input'];

        $sizeMap = [
            'xs' => 'file-input-xs',
            'sm' => 'file-input-sm',
            'md' => '',
            'lg' => 'file-input-lg',
        ];

        $variantMap = [
            'primary' => 'file-input-primary',
            'secondary' => 'file-input-secondary',
            'accent' => 'file-input-accent',
            'info' => 'file-input-info',
            'success' => 'file-input-success',
            'warning' => 'file-input-warning',
            'error' => 'file-input-error',
            'ghost' => 'file-input-ghost',
            'default' => '',
        ];

        $classes[] = self::sizeClass($this->size, $sizeMap);
        $classes[] = self::variantClass($this->variant, $variantMap);

        if ($this->bordered) {
            $classes[] = 'file-input-bordered';
        }
        if ($this->disabled) {
            $classes[] = 'file-input-disabled';
        }

        $classStr = implode(' ', array_filter($classes));
        $disabledAttr = $this->disabled ? ' disabled' : '';
        $multipleAttr = $this->multiple ? ' multiple' : '';

        $html = '';

        if ($this->label !== '') {
            $html .= '<label class="form-control w-full">';
            $html .= '<div class="label"><span class="label-text">' . htmlspecialchars($this->label) . '</span></div>';
        }

        $html .= '<input type="file" name="' . htmlspecialchars($this->name) . '" class="' . $classStr . '"' . $disabledAttr . $multipleAttr . ' />';

        if ($this->label !== '') {
            $html .= '</label>';
        }

        return $html;
    }
}
